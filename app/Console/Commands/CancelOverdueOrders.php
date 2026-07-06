<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CancelOverdueOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cancel-overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically cancel pending/unpaid orders older than 15 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting checking for overdue unpaid orders...');

        // Find orders created more than 15 minutes ago
        $timeThreshold = Carbon::now()->subMinutes(15);

        $overdueOrders = Order::where('order_status', 'pending')
            ->where('payment_status', 'pending')
            ->where('created_at', '<=', $timeThreshold)
            ->get();

        $count = $overdueOrders->count();

        if ($count === 0) {
            $this->info('No overdue orders found.');
            return 0;
        }

        foreach ($overdueOrders as $order) {
            $order->order_status = 'cancelled';
            $order->health_notes = ($order->health_notes ? $order->health_notes."\n" : '') . 
                '[Hệ thống: Tự động hủy đơn hàng quá hạn thanh toán (> 15 phút)]';
            $order->save();

            // Broadcast the cancellation to customer screen
            try {
                event(new \App\Events\OrderUpdated($order, 'cancelled'));
            } catch (\Exception $broadcastException) {
                $this->warn("Failed to broadcast cancellation for order FDL-{$order->id}: " . $broadcastException->getMessage());
            }

            $this->info("Cancelled order FDL-{$order->id}");
        }

        $this->info("Successfully cancelled {$count} overdue orders.");
        return 0;
    }
}
