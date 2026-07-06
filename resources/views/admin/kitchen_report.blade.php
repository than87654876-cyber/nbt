@extends('layouts.admin')

@section('title', 'Nhà bếp - Chuẩn bị món ăn')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Bảng chuẩn bị món ăn</h1>
        <div class="text-secondary small font-weight-bold">
            <i class="fas fa-calendar-alt mr-1"></i> Ngày giao: {{ \Carbon\Carbon::parse($todayStr)->format('d/m/Y') }}
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm py-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <!-- Đơn hàng lẻ cần chuẩn bị -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 bg-gradient-danger d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-utensils mr-2"></i>Món ăn cho Đơn hàng lẻ</h6>
                    <span class="badge badge-light text-danger font-weight-bold">{{ $singleDishes->sum('total_qty') }} Phần</span>
                </div>
                <div class="card-body">
                    @if($singleDishes->isEmpty())
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                            <p class="mb-0">Đã chuẩn bị xong hoặc không có đơn hàng lẻ nào cần làm hôm nay.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Món ăn</th>
                                        <th class="text-center" style="width: 150px;">Số lượng cần làm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($singleDishes as $item)
                                        <tr>
                                            <td class="font-weight-bold text-dark">{{ $item->dish->dish_name ?? 'Không rõ' }}</td>
                                            <td class="text-center font-weight-bold text-danger">{{ $item->total_qty }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Gói dịch vụ cần chuẩn bị -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 bg-gradient-warning d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-box-seam mr-2"></i>Món ăn cho Gói dịch vụ dài hạn</h6>
                    <span class="badge badge-light text-warning font-weight-bold">{{ $subscriptionDishes->sum('total_qty') }} Phần</span>
                </div>
                <div class="card-body">
                    @if($subscriptionDishes->isEmpty())
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                            <p class="mb-0">Không có món ăn thuộc gói dịch vụ nào cần chuẩn bị cho hôm nay.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Món ăn</th>
                                        <th class="text-center" style="width: 150px;">Số lượng cần làm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscriptionDishes as $item)
                                        <tr>
                                            <td class="font-weight-bold text-dark">{{ $item->dish->dish_name ?? 'Không rõ' }}</td>
                                            <td class="text-center font-weight-bold text-warning">{{ $item->total_qty }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Realtime Echo Listener for Kitchen (Disabled in favor of AJAX Polling) -->
<!--
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.Echo) {
            window.Echo.channel('kitchen-channel')
                .listen('OrderUpdated', (e) => {
                    console.log('Order update received in Kitchen:', e);
                    
                    if (e.action === 'created' || e.action === 'status_updated' || e.action === 'daily_dispatch') {
                        try {
                            const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                            
                            // Beep 1
                            const osc1 = audioCtx.createOscillator();
                            osc1.type = 'sawtooth';
                            osc1.frequency.setValueAtTime(880, audioCtx.currentTime); // A5 note
                            osc1.connect(audioCtx.destination);
                            osc1.start();
                            osc1.stop(audioCtx.currentTime + 0.15);
                            
                            // Beep 2
                            setTimeout(() => {
                                const osc2 = audioCtx.createOscillator();
                                osc2.type = 'sawtooth';
                                osc2.frequency.setValueAtTime(1046.50, audioCtx.currentTime); // C6 note
                                osc2.connect(audioCtx.destination);
                                osc2.start();
                                osc2.stop(audioCtx.currentTime + 0.2);
                            }, 200);
                        } catch (err) {
                            console.log('Audio error:', err);
                        }

                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'alert alert-warning alert-dismissible fade show shadow-sm mb-4';
                        alertDiv.role = 'alert';
                        alertDiv.innerHTML = `
                            <i class="fas fa-bell mr-2 text-danger"></i>
                            <strong>Có cập nhật đơn hàng mới hoặc điều phối!</strong> Bảng chuẩn bị món ăn của bếp đang tự động tải lại...
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        `;
                        document.querySelector('.container-fluid').prepend(alertDiv);

                        setTimeout(() => {
                            window.location.reload();
                        }, 1200);
                    }
                });
        }
    });
</script>
-->
<!-- Realtime AJAX Polling for Kitchen -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let lastCheckedTime = null;

        // Get initial server time
        fetch("{{ route('api.orders.poll') }}")
            .then(response => response.json())
            .then(data => {
                lastCheckedTime = data.timestamp;
                console.log('Kitchen Polling initialized at:', lastCheckedTime);
                setInterval(pollUpdates, 2000);
            })
            .catch(err => console.error('Error initializing kitchen polling:', err));

        function pollUpdates() {
            if (!lastCheckedTime) return;

            fetch(`{{ route('api.orders.poll') }}?since=${encodeURIComponent(lastCheckedTime)}`)
                .then(response => response.json())
                .then(data => {
                    lastCheckedTime = data.timestamp;
                    if (data.updates && data.updates.length > 0) {
                        let shouldReload = false;
                        data.updates.forEach(e => {
                            console.log('Polling Kitchen Event received:', e);
                            if (e.action === 'created' || e.action === 'status_updated' || e.action === 'daily_dispatch') {
                                shouldReload = true;
                            }
                        });

                        if (shouldReload) {
                            try {
                                const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                                
                                // Beep 1
                                const osc1 = audioCtx.createOscillator();
                                osc1.type = 'sawtooth';
                                osc1.frequency.setValueAtTime(880, audioCtx.currentTime); // A5 note
                                osc1.connect(audioCtx.destination);
                                osc1.start();
                                osc1.stop(audioCtx.currentTime + 0.15);
                                
                                // Beep 2
                                setTimeout(() => {
                                    const osc2 = audioCtx.createOscillator();
                                    osc2.type = 'sawtooth';
                                    osc2.frequency.setValueAtTime(1046.50, audioCtx.currentTime); // C6 note
                                    osc2.connect(audioCtx.destination);
                                    osc2.start();
                                    osc2.stop(audioCtx.currentTime + 0.2);
                                }, 200);
                            } catch (err) {
                                console.log('Audio error:', err);
                            }

                            const alertDiv = document.createElement('div');
                            alertDiv.className = 'alert alert-warning alert-dismissible fade show shadow-sm mb-4';
                            alertDiv.role = 'alert';
                            alertDiv.innerHTML = `
                                <i class="fas fa-bell mr-2 text-danger"></i>
                                <strong>Có cập nhật đơn hàng mới hoặc điều phối!</strong> Bảng chuẩn bị món ăn của bếp đang tự động tải lại...
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            `;
                            document.querySelector('.container-fluid').prepend(alertDiv);

                            setTimeout(() => {
                                window.location.reload();
                            }, 1200);
                        }
                    }
                })
                .catch(err => console.error('Error during kitchen polling:', err));
        }
    });
</script>
@endsection
