@extends('backend.master.master')
@section('title', 'Admintrator')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Tổng quan</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tổng quan</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-9">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-4 widget-left">
                            <span class="glyphicon glyphicon-signal icon-50" aria-hidden="true"></span>
                        </div>
                        <div class="col-sm-9 col-lg-8 widget-right">
                            <div class="large">{{ formatCurrency($currentMonthRevenue) }} </div>
                            <div class="text-muted">Doanh thu tháng {{ $month }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $totalOrders }}</div>
                            <div class="text-muted">Số đơn hàng</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Biểu đồ doanh thu</div>
                    <div class="panel-body">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/.row-->
        <script src="../vendor/Chartjs/Chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');


            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {{ $label }},
                    datasets: [{
                        label: 'Tổng doanh thu',
                        data: {{ $data }},
                        borderWidth: 1,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


        <!-- javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>

        </body>

        </html>
    @stop
