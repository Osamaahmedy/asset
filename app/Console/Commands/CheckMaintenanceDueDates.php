<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asset;
use App\Models\MaintenanceRequest;
use Carbon\Carbon;

class CheckMaintenanceDueDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:check-due';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check assets for upcoming maintenance and automatically create requests.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking assets for upcoming maintenance...');

        $count = 0;

        // استخدام chunk بدلاً من all() لتوفير الذاكرة مع الأعداد الكبيرة
        Asset::whereNotNull('last_maintenance_date')
            ->whereNotNull('maintenance_cycle_months')
            ->chunk(100, function ($assets) use (&$count) {
                foreach ($assets as $asset) {
                    $status = $asset->maintenance_status;

                    if (in_array($status, ['❌ Overdue', '⚠️ Less than a week'])) {
                        // Check if an open maintenance request already exists
                        $hasOpenRequest = MaintenanceRequest::where('asset_id', $asset->id)
                            ->whereIn('status', ['pending', 'postponed'])
                            ->exists();

                        if (!$hasOpenRequest) {
                            MaintenanceRequest::create([
                                'asset_id' => $asset->id,
                                'problem_date' => now(),
                                'problem_description' => "طلب صيانة وقائية تلقائي (النظام) بناءً على جدول الصيانة الدوري.",
                                'priority' => 'high',
                                'status' => 'pending',
                            ]);
                            $count++;
                            $this->info("Created maintenance request for asset ID: {$asset->id}");
                        }
                    }
                }
            });

        $this->info("Finished. Created {$count} automated maintenance requests.");
    }
}
