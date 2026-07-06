<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Calculate KPIs
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyRevenue = Order::where('payment_status', 'paid')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->sum('final_amount');

        $yearlyRevenue = Order::where('payment_status', 'paid')
            ->whereYear('created_at', $currentYear)
            ->sum('final_amount');

        $orderCount = Order::where('order_status', '!=', 'cancelled')->count();

        $activeSubscriptionCount = Subscription::where('status', 'active')->count();

        // 2. Prepare Area Chart Data (Months 1-12 of the current year)
        // Group in PHP to support both MySQL and SQLite (testing environment)
        $paidOrdersThisYear = Order::where('payment_status', 'paid')
            ->whereYear('created_at', $currentYear)
            ->get();

        $monthlyRevenueData = array_fill(1, 12, 0);
        foreach ($paidOrdersThisYear as $order) {
            $month = $order->created_at->month;
            $monthlyRevenueData[$month] += (float) $order->final_amount;
        }
        $chartAreaValues = array_values($monthlyRevenueData);

        // 3. Prepare Pie Chart Data (Single orders vs Subscription packages)
        $singleRevenue = (float) Order::where('payment_status', 'paid')
            ->where('order_type', 'single')
            ->sum('final_amount');

        $subscriptionRevenue = (float) Order::where('payment_status', 'paid')
            ->where('order_type', 'subscription')
            ->sum('final_amount');

        // Avoid division by zero if there's no revenue yet
        $totalRev = $singleRevenue + $subscriptionRevenue;
        $singlePercent = $totalRev > 0 ? round(($singleRevenue / $totalRev) * 100) : 50;
        $subscriptionPercent = $totalRev > 0 ? round(($subscriptionRevenue / $totalRev) * 100) : 50;

        return view('admin.revenue_report', compact(
            'monthlyRevenue',
            'yearlyRevenue',
            'orderCount',
            'activeSubscriptionCount',
            'chartAreaValues',
            'singleRevenue',
            'subscriptionRevenue',
            'singlePercent',
            'subscriptionPercent'
        ));
    }
}
