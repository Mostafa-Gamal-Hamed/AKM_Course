@extends('admin.layout')

@section('Title')
    Old Fainancial Accounts
@endsection

@section('Body')
    <h1 class="text-center text-dark">Old Fainancial Accounts</h1>
    <div class="container">
        <div class="row mb-4">
            @foreach ($yearsData as $years => $records)
                <a href="{{ route("oldAccount","$years") }}" class="col-xl-4 col-md-6 nav-link">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$years}}</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Year
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-sort-numeric-down-alt text-success" style="font-size: 20px"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection