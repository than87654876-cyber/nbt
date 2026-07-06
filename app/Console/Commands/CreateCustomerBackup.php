<?php

namespace App\Console\Commands;

use App\Services\CustomerBackupService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class CreateCustomerBackup extends Command
{
    protected $signature = 'backup:customers';
    protected $description = 'Generate a daily customer data backup archive.';
    protected CustomerBackupService $backupService;

    public function __construct(CustomerBackupService $backupService)
    {
        parent::__construct();
        $this->backupService = $backupService;
    }

    public function handle()
    {
        try {
            $this->backupService->createBackup(Auth::user());
            $this->info('Customer backup created successfully.');
            return 0;
        } catch (\Throwable $exception) {
            $this->error('Failed to create customer backup: ' . $exception->getMessage());
            return 1;
        }
    }
}
