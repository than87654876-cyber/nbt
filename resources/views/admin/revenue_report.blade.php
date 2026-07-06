@extends('layouts.admin')

@section('title', 'Quản lý Báo cáo doanh thu')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bảng số liệu</h1>
        <div class="dropdown">
            <button class="btn btn-sm btn-primary shadow-sm dropdown-toggle" type="button" id="dropdownExport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-download fa-sm text-white-50 mr-1"></i> Xuất báo cáo (Excel/CSV)
            </button>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownExport">
                <a class="dropdown-item" href="{{ route('baocao_xuat_orders') }}"><i class="fas fa-file-invoice mr-2 text-primary"></i>Xuất đơn hàng</a>
                <a class="dropdown-item" href="{{ route('baocao_xuat_customers') }}"><i class="fas fa-users mr-2 text-success"></i>Xuất khách hàng</a>
                <a class="dropdown-item" href="{{ route('baocao_xuat_dishes') }}"><i class="fas fa-hamburger mr-2 text-warning"></i>Xuất món ăn chạy</a>
                <a class="dropdown-item" href="{{ route('baocao_xuat_refunds') }}"><i class="fas fa-undo mr-2 text-danger"></i>Xuất hoàn tiền</a>
            </div>
        </div>
    </div>

    <!-- Weather Widget Row -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow py-2 text-white border-0" style="background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="font-weight-bold mb-1"><i class="fas fa-cloud-sun-rain mr-2"></i> DỰ BÁO THỜI TIẾT KINH DOANH</h5>
                            <p class="mb-0 small text-light" id="weather-text">Đang tải dữ liệu thời tiết...</p>
                            <p class="mb-0 mt-1 font-weight-bold" id="weather-recommendation" style="color: #ffeb3b;"></p>
                        </div>
                        <div class="text-right">
                            <span class="h2 font-weight-bold mb-0" id="weather-temp">--°C</span>
                            <div class="small text-light" id="weather-location">Hồ Chí Minh, VN</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh thu (Tháng {{ now()->format('m/Y') }})</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($monthlyRevenue, 0, ',', '.') }}đ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Doanh thu (Năm {{ now()->format('Y') }})</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($yearlyRevenue, 0, ',', '.') }}đ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Tổng đơn hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Gói dịch vụ đang chạy</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $activeSubscriptionCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tổng quan doanh thu</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Tác vụ</div>
                            <a class="dropdown-item" href="#">Tải lại</a>
                            <a class="dropdown-item" href="#">Xuất excel</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nguồn doanh thu</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Tác vụ</div>
                            <a class="dropdown-item" href="#">Tải lại</a>
                            <a class="dropdown-item" href="#">Xuất excel</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Món đơn lẻ ({{ $singlePercent }}%)
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Gói dịch vụ ({{ $subscriptionPercent }}%)
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Dynamic Charts Script -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function formatMoney(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + 'đ';
        }

        // Area Chart
        var ctxArea = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctxArea, {
          type: 'line',
          data: {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            datasets: [{
              label: "Doanh thu",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.05)",
              borderColor: "rgba(78, 115, 223, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data: @json($chartAreaValues),
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 12
                }
              }],
              yAxes: [{
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  callback: function(value, index, values) {
                    return formatMoney(value);
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  return datasetLabel + ': ' + formatMoney(tooltipItem.yLabel);
                }
              }
            }
          }
        });

        // Pie Chart
        var ctxPie = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctxPie, {
          type: 'doughnut',
          data: {
            labels: ["Món đơn lẻ", "Gói dịch vụ"],
            datasets: [{
              data: [{{ $singleRevenue }}, {{ $subscriptionRevenue }}],
              backgroundColor: ['#4e73df', '#1cc88a'],
              hoverBackgroundColor: ['#2e59d9', '#17a673'],
              hoverBorderColor: "rgba(235, 235, 235, 1)",
            }],
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, data) {
                  var label = data.labels[tooltipItem.index] || '';
                  var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                  return label + ': ' + formatMoney(value);
                }
              }
            },
            legend: {
              display: false
            },
            cutoutPercentage: 80,
          },
        });
    </script>

    <!-- Weather Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Weather API using Open-Meteo for Ho Chi Minh city (latitude 10.823, longitude 106.6296)
            fetch('https://api.open-meteo.com/v1/forecast?latitude=10.823&longitude=106.6296&current_weather=true')
                .then(response => response.json())
                .then(data => {
                    if (data && data.current_weather) {
                        const temp = data.current_weather.temperature;
                        const code = data.current_weather.weathercode;
                        document.getElementById('weather-temp').innerText = temp + '°C';
                        
                        // Parse weather description
                        let desc = 'Bầu trời trong xanh, thời tiết đẹp';
                        let recommendation = '👉 Khuyến nghị: Thời tiết đẹp, khuyến khích khách ăn tại chỗ hoặc đặt combo trưa!';
                        
                        if (code >= 1 && code <= 3) {
                            desc = 'Bầu trời nhiều mây rải rác';
                            recommendation = '👉 Khuyến nghị: Thời tiết mát mẻ, lý tưởng để đặt giao hàng combo gia đình.';
                        } else if (code >= 51 && code <= 67) {
                            desc = 'Có mưa phùn / mưa nhỏ';
                            recommendation = '👉 Khuyến nghị: Mưa nhẹ, các đơn hàng online dự kiến sẽ tăng 15%. Bố trí sẵn shipper!';
                        } else if (code >= 71 && code <= 82) {
                            desc = 'Có mưa rào / mưa dông lớn';
                            recommendation = '👉 Cảnh báo: Mưa dông lớn! Nhu cầu đặt món giao tận nơi tăng đột biến. Ưu tiên ship nhanh!';
                        } else if (code >= 95) {
                            desc = 'Có dông bão mạnh';
                            recommendation = '👉 Cảnh báo nguy hiểm: Dông bão lớn. Hạn chế ship xa, đảm bảo an toàn cho shipper!';
                        }

                        document.getElementById('weather-text').innerText = 'Hiện tại: ' + desc + ' | Tốc độ gió: ' + data.current_weather.windspeed + ' km/h';
                        document.getElementById('weather-recommendation').innerText = recommendation;
                    }
                })
                .catch(err => {
                    console.error('Weather load error:', err);
                    document.getElementById('weather-text').innerText = 'Không thể tải dữ liệu thời tiết thực tế.';
                });
        });
    </script>
@endsection