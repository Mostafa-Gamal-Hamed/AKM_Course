@extends('admin.layout')

@section('Title')
    Plans and Pricing
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">Plans and Pricing</h1>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Price</th>
                                <th>OfferPrice</th>
                                <th>Month</th>
                                <th>Sessions</th>
                                <th>Type</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                                <tr>
                                    <td>{{$plan->name}}</td>
                                    <td>{{$plan->comment}}</td>
                                    <td>{{$plan->price}}</td>
                                    <td>{{$plan->offerPrice}}</td>
                                    <td>{{$plan->month}}</td>
                                    <td>{{$plan->sessions}}</td>
                                    <td>{{$plan->type}}</td>
                                    <td>{{$plan->created_at}}</td>
                                    <td>{{$plan->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('showPlan', "$plan->id") }}"
                                            class="btn btn-info btn-circle">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('deletePlan', "$plan->id") }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle"
                                                onclick="return confirm('Are You sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
