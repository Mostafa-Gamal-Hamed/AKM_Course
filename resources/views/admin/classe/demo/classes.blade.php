@extends('admin.layout')

@section('Title')
    Demo classes
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">Demo Classes</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Num</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Demo Date</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $class->firstName }}</td>
                            <td>{{ $class->lastName }}</td>
                            <td>{{ $class->email }}</td>
                            <td>{{ $class->number }}</td>
                            <td>{{ $class->dateTime }}</td>
                            @if ($class->status == 'waiting')
                                <td>
                                    <form action="{{ route('changeStatus', "$class->id") }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-dark btn-sm text-warning"
                                            style="font-weight: bold;">{{ $class->status }}</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('changeStatus', "$class->id") }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-sm text-light"
                                            style="font-weight: bold;">{{ $class->status }}</button>
                                    </form>
                                </td>
                            @endif
                            <td>{{ $class->created_at }}</td>
                            <td>
                                <a href="{{ route('classDetails', "$class->id") }}" class="btn btn-info btn-circle">
                                    <i class="fas fa-info"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('deleteClass', "$class->id") }}" method="post">
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
@endsection
