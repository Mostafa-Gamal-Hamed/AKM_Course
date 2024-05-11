@extends('admin.layout')

@section('Title')
    {{ date('F', mktime(0, 0, 0, $month, 1)) }} accounts
@endsection

@section('Body')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Financial account for Month
                    <b>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</b>
                </h6>
            </div>
            <div class="mb-3 shadow p-2">
                <h5 class="text-center mt-2" style="font-weight: bold;">Week 1</h5>
                {{-- Managers --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Managers</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Yuan</th>
                                    <th>Currency rate</th>
                                    <th>EGP Amount</th>
                                    <th>Tutors Salarys</th>
                                    <th>Expenses</th>
                                    <th>Reasons</th>
                                    <th>Total</th>
                                    <th>Amr</th>
                                    <th>Khaled</th>
                                    <th>Mostafa</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manager1 as $manager)
                                    <tr>
                                        <td>{{ $manager->yearMonth }}</td>
                                        <td>{{ $manager->yuan }}</td>
                                        <td>{{ $manager->currency }}</td>
                                        <td>{{ round($manager->amount,3) }}</td>
                                        <td>{{ round($manager->salary,3) }}</td>
                                        <td>{{ round($manager->expenses,3) }}</td>
                                        <td>{{ $manager->reason }}</td>
                                        <td>{{ round($manager->rest,3) }}</td>
                                        <td>{{ round($manager->amr,3) }}</td>
                                        <td>{{ round($manager->khaled,3) }}</td>
                                        <td>{{ round($manager->mostafa,3) }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentManager', "$manager->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentManager', "$manager->id") }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Tutors --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Tutors</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>KPIS</th>
                                    <th>Salary</th>
                                    <th>Deduction from salary</th>
                                    <th>Additional</th>
                                    <th>Total</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutor1 as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->yearMonth }}</td>
                                        <td>{{ $data->days }}</td>
                                        <td>{{ $data->kpis }}</td>
                                        <td>{{ $data->salary }}</td>
                                        <td>{{ $data->deduction }}</td>
                                        <td>{{ $data->additional }}</td>
                                        <td>{{ $data->total }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentTutor', "$data->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentTutor', "$data->id") }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3 shadow p-2">
                <h5 class="text-center mt-2" style="font-weight: bold;">Week 2</h5>
                {{-- Managers --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Managers</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Yuan</th>
                                    <th>Currency rate</th>
                                    <th>EGP Amount</th>
                                    <th>Tutors Salarys</th>
                                    <th>Expenses</th>
                                    <th>Reasons</th>
                                    <th>Total</th>
                                    <th>Amr</th>
                                    <th>Khaled</th>
                                    <th>Mostafa</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manager2 as $manager)
                                    <tr>
                                        <td>{{ $manager->yearMonth }}</td>
                                        <td>{{ $manager->yuan }}</td>
                                        <td>{{ $manager->currency }}</td>
                                        <td>{{ round($manager->amount,3) }}</td>
                                        <td>{{ round($manager->salary,3) }}</td>
                                        <td>{{ round($manager->expenses,3) }}</td>
                                        <td>{{ $manager->reason }}</td>
                                        <td>{{ round($manager->rest,3) }}</td>
                                        <td>{{ round($manager->amr,3) }}</td>
                                        <td>{{ round($manager->khaled,3) }}</td>
                                        <td>{{ round($manager->mostafa,3) }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentManager', "$manager->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentManager', "$manager->id") }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Tutors --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Tutors</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>KPIS</th>
                                    <th>Salary</th>
                                    <th>Deduction from salary</th>
                                    <th>Additional</th>
                                    <th>Total</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutor2 as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->yearMonth }}</td>
                                        <td>{{ $data->days }}</td>
                                        <td>{{ $data->kpis }}</td>
                                        <td>{{ $data->salary }}</td>
                                        <td>{{ $data->deduction }}</td>
                                        <td>{{ $data->additional }}</td>
                                        <td>{{ $data->total }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentTutor', "$data->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentTutor', "$data->id") }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3 shadow p-2">
                <h5 class="text-center mt-2" style="font-weight: bold;">Week 3</h5>
                {{-- Managers --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Managers</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Yuan</th>
                                    <th>Currency rate</th>
                                    <th>EGP Amount</th>
                                    <th>Tutors Salarys</th>
                                    <th>Expenses</th>
                                    <th>Reasons</th>
                                    <th>Total</th>
                                    <th>Amr</th>
                                    <th>Khaled</th>
                                    <th>Mostafa</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manager3 as $manager)
                                    <tr>
                                        <td>{{ $manager->yearMonth }}</td>
                                        <td>{{ $manager->yuan }}</td>
                                        <td>{{ $manager->currency }}</td>
                                        <td>{{ round($manager->amount,3) }}</td>
                                        <td>{{ round($manager->salary,3) }}</td>
                                        <td>{{ round($manager->expenses,3) }}</td>
                                        <td>{{ $manager->reason }}</td>
                                        <td>{{ round($manager->rest,3) }}</td>
                                        <td>{{ round($manager->amr,3) }}</td>
                                        <td>{{ round($manager->khaled,3) }}</td>
                                        <td>{{ round($manager->mostafa,3) }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentManager', "$manager->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentManager', "$manager->id") }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Tutors --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Tutors</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>KPIS</th>
                                    <th>Salary</th>
                                    <th>Deduction from salary</th>
                                    <th>Additional</th>
                                    <th>Total</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutor3 as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->yearMonth }}</td>
                                        <td>{{ $data->days }}</td>
                                        <td>{{ $data->kpis }}</td>
                                        <td>{{ $data->salary }}</td>
                                        <td>{{ $data->deduction }}</td>
                                        <td>{{ $data->additional }}</td>
                                        <td>{{ $data->total }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentTutor', "$data->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentTutor', "$data->id") }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3 shadow p-2">
                <h5 class="text-center mt-2" style="font-weight: bold;">Week 4</h5>
                {{-- Managers --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Managers</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Yuan</th>
                                    <th>Currency rate</th>
                                    <th>EGP Amount</th>
                                    <th>Tutors Salarys</th>
                                    <th>Expenses</th>
                                    <th>Reasons</th>
                                    <th>Total</th>
                                    <th>Amr</th>
                                    <th>Khaled</th>
                                    <th>Mostafa</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manager4 as $manager)
                                    <tr>
                                        <td>{{ $manager->yearMonth }}</td>
                                        <td>{{ $manager->yuan }}</td>
                                        <td>{{ $manager->currency }}</td>
                                        <td>{{ round($manager->amount,3) }}</td>
                                        <td>{{ round($manager->salary,3) }}</td>
                                        <td>{{ round($manager->expenses,3) }}</td>
                                        <td>{{ $manager->reason }}</td>
                                        <td>{{ round($manager->rest,3) }}</td>
                                        <td>{{ round($manager->amr,3) }}</td>
                                        <td>{{ round($manager->khaled,3) }}</td>
                                        <td>{{ round($manager->mostafa,3) }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentManager', "$manager->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentManager', "$manager->id") }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Tutors --}}
                <div class="card-body">
                    <p class="text-success text-lg" style="font-weight: bold;">Tutors</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>KPIS</th>
                                    <th>Salary</th>
                                    <th>Deduction from salary</th>
                                    <th>Additional</th>
                                    <th>Total</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutor4 as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->yearMonth }}</td>
                                        <td>{{ $data->days }}</td>
                                        <td>{{ $data->kpis }}</td>
                                        <td>{{ $data->salary }}</td>
                                        <td>{{ $data->deduction }}</td>
                                        <td>{{ $data->additional }}</td>
                                        <td>{{ $data->total }}</td>
                                        <td>
                                            <a href="{{ route('editCurrentTutor', "$data->id") }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deleteCurrentTutor', "$data->id") }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are You sure?')">Delete</button>
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
    </div>
@endsection
