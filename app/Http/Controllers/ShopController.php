<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        // Lấy các danh mục và các món ăn thuộc danh mục đó
        $categories = Category::with(['dishes' => function ($q) use ($query) {
            $q->where('is_available', true);
            if ($query) {
                $q->where('dish_name', 'like', '%'.$query.'%');
            }
        }])->get();

        if (auth()->check()) {
            return view('client.shop_logged', compact('categories', 'query'));
        }

        return view('client.shop', compact('categories', 'query'));
    }

    public function shopLogged(Request $request)
    {
        return redirect()->route('trangchu');
    }

    // Chatbot gợi ý món ăn qua Google Gemini AI
    public function geminiChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'history' => 'nullable|array',
        ]);

        $gemini = app(\App\Services\GeminiService::class);
        $reply = $gemini->getSuggestion($request->message, $request->history ?? []);

        return response()->json([
            'success' => true,
            'reply' => $reply
        ]);
    }

    // Geocoding địa chỉ lấy tọa độ từ OpenStreetMap Nominatim
    public function geocodeAddress(Request $request)
    {
        $address = $request->query('address');
        if (empty($address)) {
            return response()->json(['success' => false, 'message' => 'Address is required.']);
        }

        try {
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'User-Agent' => 'FOODELICIOUS-Jollibee-App'
            ])->get('https://nominatim.openstreetmap.org/search', [
                'q' => $address,
                'format' => 'json',
                'limit' => 1
            ]);

            if ($response->successful() && !empty($response->json())) {
                $data = $response->json()[0];
                return response()->json([
                    'success' => true,
                    'lat' => $data['lat'],
                    'lon' => $data['lon']
                ]);
            }

            return response()->json(['success' => false, 'message' => 'Address not found.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // Tra cứu đơn hàng dành cho khách vãng lai
    public function trackOrder(Request $request)
    {
        $orderIdInput = $request->input('order_id');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $order = null;
        $searched = false;
        $error = null;

        if ($orderIdInput) {
            $searched = true;
            // Clean order code (remove FDL- prefix)
            $orderId = trim(str_ireplace('FDL-', '', $orderIdInput));

            $query = \App\Models\Order::where('id', $orderId)->with(['orderItems.dish', 'user']);

            // Validate that the order belongs to this email/phone
            $query->whereHas('user', function($q) use ($email, $phone) {
                $q->where(function($sub) use ($email, $phone) {
                    if ($email) {
                        $sub->where('email', trim($email));
                    }
                    if ($phone) {
                        $sub->orWhere('phone', trim($phone));
                    }
                });
            });

            $order = $query->first();

            if (!$order) {
                $error = 'Không tìm thấy đơn hàng phù hợp với thông tin cung cấp. Vui lòng kiểm tra lại Mã đơn hàng và Email/SĐT.';
            }
        }

        return view('client.track_order', compact('order', 'searched', 'error', 'orderIdInput', 'email', 'phone'));
    }

    // AJAX Polling for settings and data changes
    public function pollSettings(Request $request)
    {
        // 1. Get all settings
        $settings = \App\Models\Setting::pluck('value', 'key')->all();
        
        // Resolve logo_url to full asset/absolute URL
        if (isset($settings['logo_url'])) {
            $settings['logo_url'] = \Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') 
                ? $settings['logo_url'] 
                : asset($settings['logo_url']);
        } else {
            $settings['logo_url'] = asset('logo.jpg');
        }

        // Resolve banner_image to full URL
        if (isset($settings['banner_image'])) {
            $settings['banner_image'] = \Illuminate\Support\Str::startsWith($settings['banner_image'], 'http') 
                ? $settings['banner_image'] 
                : asset($settings['banner_image']);
        } else {
            $settings['banner_image'] = asset('client/assets/img/hero-img.png');
        }

        // 2. Fetch max update times of core tables to build a fingerprint
        $lastDishUpdate = \App\Models\Dish::max('updated_at');
        $lastCategoryUpdate = \App\Models\Category::max('updated_at');
        $lastCouponUpdate = \App\Models\Coupon::max('updated_at');
        $lastPackageUpdate = \App\Models\ServicePackage::max('updated_at');

        $fingerprint = md5(json_encode([
            'settings' => $settings,
            'dish' => $lastDishUpdate,
            'category' => $lastCategoryUpdate,
            'coupon' => $lastCouponUpdate,
            'package' => $lastPackageUpdate,
        ]));

        return response()->json([
            'fingerprint' => $fingerprint,
            'settings' => $settings,
            'timestamps' => [
                'dish' => $lastDishUpdate,
                'category' => $lastCategoryUpdate,
                'coupon' => $lastCouponUpdate,
                'package' => $lastPackageUpdate,
            ]
        ]);
    }

    // AJAX Polling for public guest order tracking
    public function pollTrackedOrder(Request $request)
    {
        $orderId = $request->query('order_id');
        $email = $request->query('email');
        $phone = $request->query('phone');
        $lastStatus = $request->query('last_status');
        $lastPaymentStatus = $request->query('last_payment_status');

        if (!$orderId) {
            return response()->json(['error' => 'Missing order ID'], 400);
        }

        // Clean "FDL-" prefix
        $cleanId = trim(str_ireplace('FDL-', '', $orderId));
        $query = \App\Models\Order::where('id', $cleanId);

        // Validate that this order belongs to the user matching the email or phone
        $query->whereHas('user', function($q) use ($email, $phone) {
            $q->where(function($sub) use ($email, $phone) {
                if ($email) {
                    $sub->where('email', trim($email));
                }
                if ($phone) {
                    $sub->orWhere('phone', trim($phone));
                }
            });
        });

        $order = $query->first();

        if (!$order) {
            return response()->json(['error' => 'Order not found or access denied'], 404);
        }

        // Check if there are any status modifications
        $changed = ($order->order_status !== $lastStatus) || ($order->payment_status !== $lastPaymentStatus);

        return response()->json([
            'changed' => $changed,
            'order_status' => $order->order_status,
            'payment_status' => $order->payment_status,
        ]);
    }
}
