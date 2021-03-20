@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark text-center" style="margin-bottom: 60px">THỐNG KÊ</h2>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{$donHangMoi}}</h3>

            <p>Đơn hàng mới</p>
            </div>
            <div class="icon">
            {{-- <i class="ion ion-bag"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ number_format($tongDoanhThuThang) }}<sup style="font-size: 20px">VND</sup></h3>

            <p>Doanh thu tháng {{ Carbon\Carbon::now()->month}}</p>
            </div>
            <div class="icon">
            {{-- <i class="ion ion-stats-bars"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$khachHangMoi}}</h3>

            <p>Khách hàng mới</p>
            </div>
            <div class="icon">
            {{-- <i class="ion ion-person-add"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{$donHangDaGiao}}</h3>

            <p>Đã giao</p>
            </div>
            <div class="icon">
            {{-- <i class="ion ion-pie-graph"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
        </div>
        <!-- ./col -->
    {{-- </div> --}}

    <div class="col-md-6">
        <!-- LINE CHART -->
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Biểu đồ đơn hàng theo tháng</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="chart">
            {{-- vẽ đồ thị --}}
        <canvas id="myLineChart"></canvas>

        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <div class="col-md-6">
    <!-- LINE CHART -->
    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Biểu đồ doanh thu theo tháng</h3>

    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
    </div>
    <div class="card-body">
    <div class="chart">
        {{-- vẽ đồ thị --}}
    <canvas id="myBarChart"></canvas>

    </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
    var lineChart = document.getElementById('myLineChart').getContext('2d');//myLineChart trên thẻ canvas
        var myLineChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8','Tháng 9','Tháng 10','Tháng 11', 'Tháng 12'],
                datasets: [
                    {
                        label: 'Đơn hàng',
                        backgroundColor: 'rgb(177, 186, 182)',
                        borderColor: 'rgb(74, 125, 128)',
                        data: [
                            // '2','4','3','5','7','7','4','3','8','5','6','4'
                            @foreach($thongKeDonHang as $item)
                            {{ $item }},
                            @endforeach
                        ]
                    },

                ]
            },
            options: {}
        });

        var barChart = document.getElementById('myBarChart').getContext('2d');//myLineChart trên thẻ canvas
        var myBarChart = new Chart(barChart, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8','Tháng 9','Tháng 10','Tháng 11', 'Tháng 12'],
                datasets: [
                    {
                        label: 'Doanh thu',
                        backgroundColor: 'rgb(177, 186, 182)',
                        borderColor: 'rgb(74, 125, 128)',
                        data: [
                            // '2','4','3','5','7','7','4','3','8','5','6','4'
                            @foreach($thongKeDoanhThu as $item)
                            {{ $item }},
                            @endforeach
                        ]
                    },

                ]
            },
            options: {}
        });


    </script>



@endsection
