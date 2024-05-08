@extends('admin.layout')

@section('Title')
    Admin Dashboard
@endsection

@section('Body')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i>
                Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings for managers -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    $ <span class="result">{{ $earnings }}</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings for each manager -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings For Each Manager
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    $ <span class="result">{{ $eachManager }}</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All expenses  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Expenses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    $ <span class="result">{{ $expenses }}</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Number of teachers -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Number of teachers
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{$tutor}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chalkboard-teacher text-gray-300" style="font-size: 25px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Chart --}}
        <div class="card shadow mb-4 p-2">
            <h1>{{ $chart->options['chart_title'] }}</h1>
            {!! $chart->renderHtml() !!}
        </div>

    </div>
    <!-- End of Main Content -->

    {{-- JS --}}
    {!! $chart->renderChartJsLibrary() !!}
    {!! $chart->renderJs() !!}

    <script>
        // Add , to numbers
        $(document).ready(function() {
            $('.result').each(function() {
                var result = parseFloat($(this).text());
                var formattedResult = numberWithCommas(result.toFixed(2));
                $(this).text(formattedResult);
            });
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

@endsection
