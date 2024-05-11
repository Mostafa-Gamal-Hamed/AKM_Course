@extends('admin.layout')

@section('Title')
    All Students
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">All Students</h1>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Our Students</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Start date</th>
                                <th>Level</th>
                                <th>City</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <img src=" {{ asset("storage/$student->image") }} " class="img-fluid rounded-circle"
                                            width="100px" alt="Tutor">
                                    </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->startDate }}</td>
                                    <td>{{ $student->level }}</td>
                                    <td>{{ $student->city }}</td>
                                    <td>
                                        <a href="{{ route('studentDetails', "$student->id") }}"
                                            class="btn btn-info btn-circle">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('studentDelete', "$student->id") }}" method="post">
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
