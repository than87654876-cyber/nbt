<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use App\Models\DailySchedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DispatchDailySubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:dispatch-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically dispatch pending schedules for active subscriptions for today';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting checking for subscription daily schedules to dispatch...');

        $today = Carbon::today()->format('Y-m-d');

        // Find all pending daily schedules scheduled for today or earlier for active subscriptions
        $schedules = DailySchedule::where('delivery_status', 'pending')
            ->whereDate('delivery_date', '<=', $today)
            ->whereHas('subscription', function ($q) {
                $q->where('status', 'active');
            })
            ->with(['subscription', 'dish'])
            ->get();

        $count = $schedules->count();

        if ($count === 0) {
            $this->info('No daily schedules found to dispatch today.');
            return 0;
        }

        foreach ($schedules as $schedule) {
            $subscription = $schedule->subscription;

            // Mark schedule as delivered and lock it
            $schedule->delivery_status = 'delivered';
            $schedule->is_locked = true;
            $schedule->save();

            // Decrement remaining days
            if ($subscription->remaining_days > 0) {
                $subscription->remaining_days -= 1;
                if ($subscription->remaining_days == 0) {
                    $subscription->status = 'expired';
                }
                $subscription->save();
            }

            // Fire OrderUpdated broadcast event if original order exists
            if ($subscription->order) {
                try {
                    event(new \App\Events\OrderUpdated($subscription->order, 'daily_dispatch'));
                } catch (\Exception $broadcastException) {
                    $this->warn("Failed to broadcast order update event for subscription ID {$subscription->id}: " . $broadcastException->getMessage());
                }
            }

            $dishName = $schedule->dish ? $schedule->dish->dish_name : 'N/A';
            $this->info("Dispatched schedule ID {$schedule->id} (Dish: {$dishName}) for Subscription ID {$subscription->id}");
        }

        $this->info("Successfully dispatched {$count} daily schedules.");
        return 0;
    }
}
