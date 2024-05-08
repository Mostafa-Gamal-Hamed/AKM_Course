@extends('admin.layout')

@section('Title')
    Edit Financial
@endsection

@section('Body')
    <h1 class="text-center text-dark mb-5">Edit {{ $tutor->yearMonth }} week {{ $tutor->week }} Financial</h1>
    <div class="container">
        <div class="mt-5 mb-3">
            <h4 class="text-center text-primary" style="font-weight: bold;">Tutor Financial Account</h4>
            <form action="{{ route('updateTutorAccount', "$tutor->id") }}" method="post">
                @csrf
                @method('PUT')
                {{-- Name --}}
                <div class="form-group">
                    <input type="text" name="tutor" class="form-control form-control-user" id="Tutor"
                        placeholder="Tutor Name" value="{{ $tutor->name }}" required>
                    <span id="TutorError"></span>
                    @error('tutor')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Date & Week --}}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" name="tutorYearMonth" class="form-control form-control-user"
                            id="tutorYearMonth" value="{{ $tutor->yearMonth }}" required>
                        <span id="tutorYearMonthError"></span>
                        @error('tutorYearMonth')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <select name="tutorWeek" id="tutorWeek" class="custom-select">
                            <option value="{{ $tutor->week }}" hidden>
                                Week {{ $tutor->week }}
                            </option>
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
                            placeholder="Days" value="{{ $tutor->days }}" required>
                        <span id="DaysError"></span>
                        @error('days')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="number" name="kpis" class="form-control form-control-user" id="Kpis"
                            placeholder="KPIS" value="{{ $tutor->kpis }}">
                        <span id="KpisError"></span>
                        @error('kpis')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Salary & deduction --}}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" name="tutorSalary" class="form-control form-control-user" id="tutorSalary"
                            placeholder="Salary" value="{{ $tutor->salary }}" required>
                        <span id="tutorSalaryError"></span>
                        @error('tutorSalary')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="number" name="deduction" class="form-control form-control-user" id="Deduction"
                            placeholder="Deduction From Salary" value="{{ $tutor->deduction }}">
                        <span id="DeductionError"></span>
                        @error('deduction')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Additional & Total --}}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" name="additional" class="form-control form-control-user" id="Additional"
                            placeholder="Additional" value="{{ $tutor->additional }}">
                        <span id="AdditionalError"></span>
                        @error('additional')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="total" class="form-control form-control-user" id="Total"
                            placeholder="Total" value="{{ $tutor->total }}" required>
                        <span id="TotalError"></span>
                        @error('total')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-25">Update</button>
            </form>
        </div>
    </div>
@endsection
