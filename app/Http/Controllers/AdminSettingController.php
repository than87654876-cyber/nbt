<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    // Hiển thị giao diện cấu hình
    public function index()
    {
        // Settings are shared globally, but we can query them again here to be safe
        $settings = Setting::pluck('value', 'key')->all();
        if (!isset($settings['map_original_url']) && isset($settings['map_embed_url'])) {
            $settings['map_original_url'] = $settings['map_embed_url'];
        }
        return view('admin.settings', compact('settings'));
    }

    // Cập nhật cấu hình
    public function update(Request $request)
    {
        $request->validate([
            'banner_title' => 'required|string|max:255',
            'banner_subtitle' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:50',
            'contact_email' => 'required|email|max:100',
            'contact_address' => 'required|string|max:255',
            'map_embed_url' => 'required|string',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cập nhật các trường chữ
        Setting::setValue('banner_title', $request->input('banner_title'));
        Setting::setValue('banner_subtitle', $request->input('banner_subtitle'));
        Setting::setValue('contact_phone', $request->input('contact_phone'));
        Setting::setValue('contact_email', $request->input('contact_email'));
        Setting::setValue('contact_address', $request->input('contact_address'));
        
        $rawMapUrl = $request->input('map_embed_url');
        Setting::setValue('map_original_url', $rawMapUrl);
        $resolvedMapUrl = $this->resolveMapEmbedUrl($rawMapUrl);
        Setting::setValue('map_embed_url', $resolvedMapUrl);

        // Xử lý upload ảnh Logo
        if ($request->hasFile('logo_image')) {
            $logoUrl = null;
            try {
                $cloudinary = app(\App\Services\CloudinaryService::class);
                $logoUrl = $cloudinary->upload($request->file('logo_image'));
            } catch (\Exception $e) {
                Log::warning('Cloudinary settings logo upload failed: ' . $e->getMessage());
            }

            if (!$logoUrl) {
                $file = $request->file('logo_image');
                $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $logoUrl = '/uploads/' . $filename;
            }

            Setting::setValue('logo_url', $logoUrl);
        }

        // Xử lý upload ảnh Banner chính
        if ($request->hasFile('banner_image')) {
            $bannerUrl = null;
            try {
                $cloudinary = app(\App\Services\CloudinaryService::class);
                $bannerUrl = $cloudinary->upload($request->file('banner_image'));
            } catch (\Exception $e) {
                Log::warning('Cloudinary settings banner upload failed: ' . $e->getMessage());
            }

            if (!$bannerUrl) {
                $file = $request->file('banner_image');
                $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $bannerUrl = '/uploads/' . $filename;
            }

            Setting::setValue('banner_image', $bannerUrl);
        }

        // Xóa cache cấu hình
        try {
            \Illuminate\Support\Facades\Artisan::call('view:clear');
        } catch (\Exception $e) {
            // Ignore if fails
        }

        return redirect()->route('quanly_cauhinh')->with('success', 'Đã cập nhật cấu hình trang chủ thành công!');
    }

    // Resolves raw Google Maps URL to embed URL
    protected function resolveMapEmbedUrl($url)
    {
        if (!$url) {
            return 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1415053648486!2d106.6917926!3d10.8004543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528c2576b92dd%3A0x6e9ca9bc8926958b!2zMTIzIEzDqiBI4buTbmcgUGjDuW5nLCBRdeG6rW4gMywgVFAuSENN!5e0!3m2!1svi!2s!4v1539943755621';
        }

        $url = trim($url);

        // 1. If it's an iframe code, extract the src
        if (preg_match('/src="([^"]+)"/', $url, $match)) {
            return $match[1];
        }

        // 2. If it's a shortened google maps link, follow redirects
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            if (str_contains($url, 'maps.app.goo.gl') || str_contains($url, 'goo.gl/maps')) {
                try {
                    $response = \Illuminate\Support\Facades\Http::withoutRedirecting()->head($url);
                    if ($response->status() >= 300 && $response->status() < 400) {
                        $redirectUrl = $response->header('Location');
                        if ($redirectUrl) {
                            $url = $redirectUrl;
                        }
                    }
                } catch (\Exception $e) {
                    Log::warning('Failed resolving map redirect: ' . $e->getMessage());
                }
            }
        }

        // 3. Try to extract /place/Place+Name/
        if (preg_match('/\/place\/([^\/]+)/', $url, $matches)) {
            $placeName = urldecode($matches[1]);
            $placeName = str_replace('+', ' ', $placeName);
            return "https://maps.google.com/maps?q=" . urlencode($placeName) . "&output=embed";
        }

        // 4. Try to extract coordinates @lat,lon
        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            $lat = $matches[1];
            $lon = $matches[2];
            return "https://maps.google.com/maps?q={$lat},{$lon}&output=embed";
        }

        // 5. If it's a URL but didn't match place/coords, search for the URL itself
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return "https://maps.google.com/maps?q=" . urlencode($url) . "&output=embed";
        }

        // 6. If it's a raw address, search for the address
        return "https://maps.google.com/maps?q=" . urlencode($url) . "&output=embed";
    }
}
