@extends('admin.layout')

@section('Title')
    Current Fainancial Accounts
@endsection

@section('Body')
<h1 class="text-center text-dark mb-5">Show {{$year}} Fainancial Accounts</h1>
    <div class="container">
        <div class="row mb-4">
            <a href="{{ route("showCurrentAccount","$year-1") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">January</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                01
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-2") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">February</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                02
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-3") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">March</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                03
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-4") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">April</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                04
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-5") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">May</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                05
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-6") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">June</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                06
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-7") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">July</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                07
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-8") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">August</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                08
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-9") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">September</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                09
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-10") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">October</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                10
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-11") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">November</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                11
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route("showCurrentAccount","$year-12") }}" class="col-xl-4 col-md-6 nav-link">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">December</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Month
                                </div>
                            </div>
                            <div class="col-auto">
                                12
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection