@extends('admin.layout')

@section('Title')
    Add Financial Accounts
@endsection

@section('Body')
    <h1 class="text-center text-dark mb-5">Add Financial Accounts</h1>
    <div class="container">
        <div class="row justify-content-center">
            <button class="btn col-xl-4 col-md-6 nav-link" id="managerButton">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Managers</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-crown"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
            <button class="btn col-xl-4 col-md-6 nav-link" id="tutorButton">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tutors</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </div>

        <div>
            {{-- Add Financial account for managers --}}
            <div class="mt-5 mb-3" id="managerAccount">
                <h4 class="text-center text-primary" style="font-weight: bold;">Managers Financial Account</h4>
                <form action="{{ route('storeFinancialManager') }}" method="post">
                    @csrf
                    <div class="addManagersAccount mb-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Month & Year</th>
                                    <th>Week</th>
                                    <th>Yuan</th>
                                    <th>Currency rate</th>
                                    <th>EGP Amount</th>
                                    <th>Salarys</th>
                                    <th>Expenses</th>
                                    <th>Expenses reasons</th>
                                    <th>The rest</th>
                                    <th>Amr</th>
                                    <th>Khaled</th>
                                    <th>Mostafa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="date" name="yearMonth" class="form-control form-control-user"
                                            id="yearMonth" value="{{old('yearMonth')}}" required>
                                        @error('yearMonth')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="week" id="week" class="custom-select" required>
                                            <option hidden>Select</option>
                                            <option value="1">Week 1</option>
                                            <option value="2">Week 2</option>
                                            <option value="3">Week 3</option>
                                            <option value="4">Week 4</option>
                                        </select>
                                        @error('week')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="yuan"
                                            class="form-control form-control-user numeric-input" id="yuan"
                                            step="any" value="{{old('yuan')}}" required>
                                        @error('yuan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="currency"
                                            class="form-control form-control-user numeric-input" id="currency"
                                            step="any" value="{{old('currency')}}" required>
                                        @error('currency')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="amount"
                                            class="form-control form-control-user numeric-input" id="amount"
                                            step="any" value="{{old('amount')}}" required readonly>
                                        @error('amount')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="salary"
                                            class="form-control form-control-user numeric-input" id="salary"
                                            step="any" value="{{old('salary')}}" required>
                                        @error('salary')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="expenses"
                                            class="form-control form-control-user" id="expenses"
                                            step="any" value="{{old('expenses')}}">
                                        @error('expenses')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" name="reason" class="form-control form-control-user"
                                            value="{{old('reason')}}" id="reason">
                                        @error('reason')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="rest"
                                            class="form-control form-control-user numeric-input" id="rest"
                                            step="any" value="{{old('rest')}}" required readonly>
                                        @error('rest')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="amr"
                                            class="form-control form-control-user numeric-input" id="amr"
                                            step="any" value="{{old('amr')}}" required readonly>
                                        @error('amr')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="khaled"
                                            class="form-control form-control-user numeric-input" id="khaled"
                                            step="any" value="{{old('khaled')}}" required readonly>
                                        @error('khaled')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" name="mostafa"
                                            class="form-control form-control-user numeric-input" id="mostafa"
                                            step="any"  value="{{old('mostafa')}}" required readonly>
                                        @error('mostafa')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-success w-25">Add</button>
                </form>
            </div>

            {{-- Add Financial account for Tutors --}}
            <div class="mt-5 mb-3" id="tutorAccount">
                <h4 class="text-center text-primary" style="font-weight: bold;">Tutor Financial Account</h4>
                <form action="{{ route('storeFinancialTutor') }}" method="post">
                    @csrf
                    {{-- Name --}}
                    <div class="form-group">
                        <select name="tutor" class="custom-select" id="Tutor" required>
                            <option hidden>Select Tutor</option>
                            @foreach ($tutors as $tutor)
                                <option value="{{$tutor->name}}">{{$tutor->name}}</option>
                            @endforeach
                        </select>
                        <span id="TutorError"></span>
                        @error('tutor')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Date & Week --}}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="date" name="tutorYearMonth" class="form-control form-control-user"
                                id="tutorYearMonth" value="{{old('tutorYearMonth')}}" required>
                            <span id="tutorYearMonthError"></span>
                            @error('tutorYearMonth')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <select name="tutorWeek" id="tutorWeek" class="custom-select">
                                <option hidden>Select</option>
                                <option value="1">Week 1</option>
                                <option value="2">Week 2</option>
                                <option value="3">Week 3</option>
                                <option value="4">Week 4</option>
                            </select>
                            <span id="tutorWeekError"></span>
                            @error('tutorWeek')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Days & Kpis --}}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" name="days" class="form-control form-control-user" id="Days"
                                placeholder="Days" value="{{old('days')}}" required>
                            <span id="DaysError"></span>
                            @error('days')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="number" name="kpis" class="form-control form-control-user" id="Kpis"
                                placeholder="KPIS" value="{{old('kpis')}}">
                            <span id="KpisError"></span>
                            @error('kpis')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Salary & deduction --}}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" name="tutorSalary" class="form-control form-control-user"
                                id="tutorSalary" placeholder="Salary" value="{{old('tutorSalary')}}" required>
                            <span id="tutorSalaryError"></span>
                            @error('tutorSalary')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="number" name="deduction" class="form-control form-control-user" id="Deduction"
                                placeholder="Deduction From Salary" value="{{old('deduction')}}">
                            <span id="DeductionError"></span>
                            @error('deduction')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Additional & Total --}}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" name="additional" class="form-control form-control-user"
                                id="Additional" placeholder="Additional" value="{{old('additional')}}">
                            <span id="AdditionalError"></span>
                            @error('additional')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="total" class="form-control form-control-user" id="Total"
                                placeholder="Total" value="{{old('total')}}" readonly required>
                            <span id="TotalError"></span>
                            @error('total')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-25">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
