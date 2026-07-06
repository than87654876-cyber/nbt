<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // ==========================================
    // KHÁCH HÀNG (CUSTOMERS) CRUD
    // ==========================================

    // Danh sách khách hàng
    public function customersList(Request $request)
    {
        $filter = $request->input('filter');
        $query = User::where('role', 'customer')->orderBy('created_at', 'desc');
        $query = $this->applyCustomerFilter($query, $filter);

        $customers = $query->get();

        return view('admin.customers', compact('customers', 'filter'));
    }

    private function applyCustomerFilter(Builder $query, ?string $filter): Builder
    {
        if ($filter === 'first_order') {
            $query->whereHas('orders');
        } elseif ($filter === 'active_package') {
            $query->whereHas('subscriptions', function ($q) {
                $q->where('status', 'active');
            });
        } elseif ($filter === 'refunded') {
            $query->whereHas('orders', function ($q) {
                $q->where('payment_status', 'refunded')
                  ->orWhere('health_notes', 'like', '%hoàn tiền%');
            });
        } elseif ($filter === 'inactive_3m') {
            $threeMonthsAgo = now()->subMonths(3);
            $query->where('created_at', '<', $threeMonthsAgo)
                  ->whereDoesntHave('orders', function ($q) use ($threeMonthsAgo) {
                      $q->where('created_at', '>=', $threeMonthsAgo);
                  });
        }

        return $query;
    }

    // Chi tiết khách hàng
    public function customerShow($id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);

        return view('admin.customers_detail', compact('customer'));
    }

    // Form chỉnh sửa khách hàng
    public function customerEdit($id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);

        return view('admin.customers_edit', compact('customer'));
    }

    // Cập nhật thông tin khách hàng
    public function customerUpdate(Request $request, $id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);

        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,'.$customer->id,
            'points' => 'required|integer|min:0',
            'membership' => 'required|string|in:bronze,silver,gold,diamond',
            'notes' => 'nullable|string',
        ]);

        $customer->update($request->only('fullname', 'phone', 'email', 'points', 'membership', 'notes'));

        return redirect()->route('quanly_khachhang')->with('success', 'Cập nhật thông tin khách hàng thành công!');
    }

    // Xóa tài khoản khách hàng
    public function customerDestroy($id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);

        // Kiểm tra xem khách hàng có đơn hàng hoặc đăng ký gói không
        if ($customer->orders()->count() > 0 || $customer->subscriptions()->count() > 0) {
            return redirect()->route('quanly_khachhang')->with('error', 'Không thể xóa khách hàng này vì đã có dữ liệu đơn hàng hoặc gói dịch vụ liên kết.');
        }

        $customer->delete();

        return redirect()->route('quanly_khachhang')->with('success', 'Đã xóa tài khoản khách hàng thành công!');
    }

    // Danh sách khách vãng lai
    public function guestsList()
    {
        $guests = User::where('role', 'guest')->withCount('orders')->orderBy('created_at', 'desc')->get();
        return view('admin.guests', compact('guests'));
    }

    // ==========================================
    // NHÂN VIÊN (EMPLOYEES) CRUD
    // ==========================================

    // Danh sách nhân viên
    public function employeesList()
    {
        // Lấy tất cả nhân viên (staff và admin)
        $employees = User::whereIn('role', ['staff', 'admin'])->orderBy('created_at', 'desc')->get();

        return view('admin.employees', compact('employees'));
    }

    // Form thêm mới nhân viên
    public function employeeCreate()
    {
        return view('admin.employees_add');
    }

    // Lưu nhân viên mới
    public function employeeStore(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:staff,admin',
            'status' => 'required|integer|in:0,1',
            'notes' => 'nullable|string', // dùng để lưu chức vụ cụ thể hoặc ghi chú
        ]);

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('quanly_nhanvien')->with('success', 'Thêm mới nhân viên thành công!');
    }

    // Chi tiết nhân viên
    public function employeeShow($id)
    {
        $employee = User::whereIn('role', ['staff', 'admin'])->findOrFail($id);

        return view('admin.employees_detail', compact('employee'));
    }

    // Form chỉnh sửa thông tin nhân viên
    public function employeeEdit($id)
    {
        $employee = User::whereIn('role', ['staff', 'admin'])->findOrFail($id);

        return view('admin.employees_edit', compact('employee'));
    }

    // Cập nhật thông tin nhân viên
    public function employeeUpdate(Request $request, $id)
    {
        $employee = User::whereIn('role', ['staff', 'admin'])->findOrFail($id);

        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,'.$employee->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|in:staff,admin',
            'status' => 'required|integer|in:0,1',
            'notes' => 'nullable|string',
        ]);

        $data = $request->only('fullname', 'phone', 'email', 'role', 'status', 'notes');
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $employee->update($data);

        return redirect()->route('quanly_nhanvien')->with('success', 'Cập nhật thông tin nhân viên thành công!');
    }

    // Xóa nhân viên
    public function employeeDestroy($id)
    {
        $employee = User::whereIn('role', ['staff', 'admin'])->findOrFail($id);

        // Không cho phép tự xóa tài khoản của chính mình đang đăng nhập
        if ($employee->id === auth()->id()) {
            return redirect()->route('quanly_nhanvien')->with('error', 'Bạn không thể tự xóa tài khoản của chính mình.');
        }

        $employee->delete();

        return redirect()->route('quanly_nhanvien')->with('success', 'Đã xóa tài khoản nhân viên thành công!');
    }

    // Xuất báo cáo khách hàng (Excel .xlsx)
    public function exportCustomersExcel(Request $request)
    {
        $filter = $request->input('filter');
        $query = User::whereIn('role', ['customer', 'guest'])->orderBy('created_at', 'desc');
        $query = $this->applyCustomerFilter($query, $filter);

        $users = $query->with([
            'orders' => function ($q) {
                $q->orderBy('created_at', 'desc');
            },
            'subscriptions',
        ])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Khách hàng');

        $headers = [
            'Mã KH',
            'Họ và tên',
            'Email',
            'Số điện thoại',
            'Vai trò',
            'Điểm tích lũy',
            'Hạng thành viên',
            'Trạng thái tài khoản',
            'Ngày đăng ký',
            'Tổng đơn hàng',
            'Tổng chi tiêu (đã thanh toán)',
            'Số đơn hoàn tiền',
            'Lần đặt đơn gần nhất',
            'Đang dùng gói',
            'Ghi chú nội bộ',
        ];

        $columnIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex++, 1, $header);
        }

        $rowNumber = 2;
        foreach ($users as $user) {
            $roleText = $user->role === 'customer' ? 'Thành viên' : 'Khách vãng lai';
            $membershipLabel = match ($user->membership) {
                'diamond' => 'Kim cương',
                'gold' => 'Vàng',
                'silver' => 'Bạc',
                default => 'Đồng',
            };
            $statusText = $user->status ? 'Hoạt động' : 'Bị khóa';
            $totalOrders = $user->orders->count();
            $refundedOrders = $user->orders->where('payment_status', 'refunded')->count();
            $paidOrders = $user->orders->where('payment_status', 'paid');
            $totalSpent = $paidOrders->sum('final_amount');
            $lastOrderAt = $user->orders->first()?->created_at?->format('d/m/Y H:i') ?? 'Chưa có đơn';
            $activePackageText = $user->subscriptions->where('status', 'active')->count() ? 'Có' : 'Không';
            $notes = $user->notes ?: 'Không có';

            $sheet->setCellValueByColumnAndRow(1, $rowNumber, 'KH-' . sprintf('%03d', $user->id));
            $sheet->setCellValueByColumnAndRow(2, $rowNumber, $user->fullname);
            $sheet->setCellValueByColumnAndRow(3, $rowNumber, $user->email);
            $sheet->setCellValueByColumnAndRow(4, $rowNumber, $user->phone ?? 'Chưa cập nhật');
            $sheet->setCellValueByColumnAndRow(5, $rowNumber, $roleText);
            $sheet->setCellValueByColumnAndRow(6, $rowNumber, $user->points);
            $sheet->setCellValueByColumnAndRow(7, $rowNumber, $membershipLabel);
            $sheet->setCellValueByColumnAndRow(8, $rowNumber, $statusText);
            $sheet->setCellValueByColumnAndRow(9, $rowNumber, $user->created_at->format('d/m/Y H:i'));
            $sheet->setCellValueByColumnAndRow(10, $rowNumber, $totalOrders);
            $sheet->setCellValueByColumnAndRow(11, $rowNumber, $totalSpent);
            $sheet->setCellValueByColumnAndRow(12, $rowNumber, $refundedOrders);
            $sheet->setCellValueByColumnAndRow(13, $rowNumber, $lastOrderAt);
            $sheet->setCellValueByColumnAndRow(14, $rowNumber, $activePackageText);
            $sheet->setCellValueByColumnAndRow(15, $rowNumber, $notes);

            $rowNumber++;
        }

        foreach (range('A', 'O') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'danh-sach-khach-hang.xlsx';

        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            'Cache-Control' => 'max-age=0',
        ];

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename, $headers);
    }
}
