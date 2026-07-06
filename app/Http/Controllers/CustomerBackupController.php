<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerBackup;
use App\Services\CustomerBackupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CustomerBackupController extends Controller
{
    protected CustomerBackupService $backupService;

    public function __construct(CustomerBackupService $backupService)
    {
        $this->backupService = $backupService;
    }

    public function index()
    {
        $backups = CustomerBackup::with(['createdBy', 'restoredBy'])
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.customer_backups', compact('backups'));
    }

    public function createBackup(Request $request)
    {
        try {
            $backup = $this->backupService->createBackup(Auth::user());
            return redirect()->back()->with('success', 'Tạo bản sao lưu thành công: ' . $backup->filename);
        } catch (\Throwable $exception) {
            Log::error('Backup customers failed: ' . $exception->getMessage(), ['exception' => $exception]);
            return redirect()->back()->with('error', 'Tạo bản sao lưu thất bại: ' . $exception->getMessage());
        }
    }

    public function downloadBackup($id)
    {
        $backup = CustomerBackup::findOrFail($id);

        if (!Storage::disk('local')->exists($backup->storage_path)) {
            return redirect()->back()->with('error', 'Không tìm thấy file sao lưu.');
        }

        return Storage::disk('local')->download($backup->storage_path, $backup->filename);
    }

    public function restoreBackup(Request $request, $id)
    {
        $backup = CustomerBackup::findOrFail($id);

        if ($request->input('confirm') !== 'yes') {
            return redirect()->back()->with('error', 'Vui lòng xác nhận trước khi khôi phục.');
        }

        try {
            $this->backupService->restoreBackup($backup, Auth::user());
            return redirect()->back()->with('success', 'Khôi phục dữ liệu từ bản sao lưu thành công.');
        } catch (\Throwable $exception) {
            Log::error('Restore customers failed: ' . $exception->getMessage(), ['exception' => $exception]);
            return redirect()->back()->with('error', 'Khôi phục thất bại: ' . $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        $backup = CustomerBackup::findOrFail($id);

        try {
            $this->backupService->deleteBackup($backup, Auth::user());
            return redirect()->back()->with('success', 'Xóa bản sao lưu thành công.');
        } catch (\Throwable $exception) {
            Log::error('Delete customers backup failed: ' . $exception->getMessage(), ['exception' => $exception]);
            return redirect()->back()->with('error', 'Xóa bản sao lưu thất bại: ' . $exception->getMessage());
        }
    }
}
