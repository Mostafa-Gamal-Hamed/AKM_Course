@extends('admin.layout')

@section('Title')
    All Users
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">All Users</h1>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Managers & Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->type === 'admin')
                                        <td><span class="text-warning" style="font-size:18px;">{{ $user->type }}</span>
                                        </td>
                                        <td></td>
                                    @else
                                        <td><span class="text-primary" style="font-size:18px;">{{ $user->type }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('managerDetails', "$user->id") }}"
                                                class="btn btn-info btn-circle">
                                                <i class="fas fa-info"></i>
                                            </a>
                                        </td>
                                    @endif
                                    <td>
                                        <form action="{{ route('managerDelete', "$user->id") }}" method="post">
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
