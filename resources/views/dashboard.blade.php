<x-app-layout>

    <x-slot name="header">
        <div class="row">
            <h2 class="col-5 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('messages.Dashboard') }}
            </h2>
            @if ($user->type == 'tutor')
                <div class="col-7">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">Add class</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('allClasses') }}" class="nav-link">All Classes</a>
                        </li>
                    </ul>
                </div>
            @endif
            {{-- @if ($user->type == 'student')
                hi
            @endif --}}
        </div>
    </x-slot>

    <div class="container mt-5">
        <div class="shadow bg-light p-4 rounded">
            <div class="text-dark">
                {{-- Tutor --}}
                @if ($user->type == 'tutor')
                    <p class="text-center mb-3" style="font-size: 20px;font-weight: bold;">Your classes for this
                        week
                    </p>
                    <hr>
                    <div style="overflow: auto;">
                        <form action="{{ route('addClass', "$user->email") }}" style="overflow-x: auto;" method="post">
                            @csrf
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Week</th>
                                        <th>Reserved classes</th>
                                        <th>Absent classes</th>
                                        <th>Conducted Classes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="week" class="form-select m-auto rounded numeric-input"
                                                id="week" required>
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
                                            <input type="number" name="reserved"
                                                class="form-control w-75 m-auto rounded numeric-input"
                                                value="{{ old('reserved') }}" id="reserved" required>
                                            @error('reserved')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="absent"
                                                class="form-control w-75 m-auto rounded numeric-input"
                                                value="{{ old('absent') }}" id="absent" required>
                                            @error('absent')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="conducted"
                                                class="form-control w-75 m-auto rounded numeric-input"
                                                value="{{ old('conducted') }}" id="conducted" readonly required>
                                            @error('conducted')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <span id="errorMessage"></span>
                            <br>
                            <button type="submit" class="btn btn-outline-primary" id="button">Submit</button>
                        </form>
                    </div>
                @endif

                {{-- Student --}}
                @if ($user->type == 'student')
                    <div class="row justify-content-center gap-2">
                        <div class="col">
                            <div class="border rounded-start rounded-top">
                                <h2
                                    style="height: 35px;padding: 5px;background-color: rgb(220, 220, 220);font-size:20px;font-weight: bold;">
                                    {{ __('messages.Payment') }}
                                </h2>
                                <div class="rounded fs-5 p-1 fw-bold">
                                    <p>{{ __('messages.Payment') }} : {{ __("messages.$student->payment") }}</p>
                                    <p>{{ __('messages.The amount') }} : {{ $student->amount }}</p>
                                    @if ($student->payment != 'cash')
                                        <p>{{ __('messages.Remaining sessions') }} : {{ $student->remaining }}</p>
                                        <p>{{ __('messages.Payment date') }} : {{ $student->paymentDate }}</p>
                                    @endif
                                    <p>{{ __('messages.Paid date') }} : {{ $student->Paid }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border rounded-start rounded-top">
                                <h2
                                    style="height: 35px;padding: 5px;background-color: rgb(220, 220, 220);font-size:20px;font-weight: bold;">
                                    {{ __('messages.sessions') }}
                                </h2>
                                <div class="rounded fs-5 p-1 fw-bold">
                                    <p>{{ __('messages.Start date') }} : {{ $student->startDate }}</p>
                                    <p>{{ __('messages.End date') }} : {{ $student->endDate }}</p>
                                    <p>{{ __('messages.Level') }} : <span
                                            class="text-primary">{{ $student->levels }}</span></p>
                                    <p>{{ __('messages.sessions') }} : <span
                                            class="text-info">{{ $student->sessions }}</span></p>
                                    <p>{{ __('messages.Session attended') }} : <span
                                            class="text-success">{{ $student->Attended }}</span>
                                    </p>
                                    <p>{{ __('messages.Session absented') }} : <span
                                            class="text-danger">{{ $student->Absented }}</span></p>
                                    <p>{{ __('messages.Remaining sessions') }} : <span
                                            class="text-warning">{{ $student->remainingSessions }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border rounded-start rounded-top">
                                <h2
                                    style="height: 35px;padding: 5px;background-color: rgb(220, 220, 220);font-size:20px;font-weight: bold;">
                                    {{ __('messages.Book') }}
                                </h2>
                                <div class="rounded fs-5 p-1 fw-bold">
                                    <p>{{ __('messages.Book') }} :
                                        <span class="text-primary">{{ Str::after($student->level->book, 'books/') }}</span>
                                    </p>
                                    <div class="d-flex">

                                        <p>{{ __('messages.View book') }} : <a
                                                href="{{ route('viewBook', "{$student->level->id}") }}"
                                                target="_blank">{{ __('messages.click') }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-2">
                    {{-- <div>
                        <h1 style="padding:10px;background-color: rgb(220, 220, 220);font-size: 20px;font-weight: bold;"
                            class="text-center">Session Videos</h1>
                    </div> --}}
                @endif
            </div>
        </div>
    </div>

    <script>
        // calculate
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("reserved").addEventListener("keyup", calculate);
            document.getElementById("absent").addEventListener("keyup", calculate);

            function calculate() {
                var reserved = parseFloat(document.getElementById("reserved").value) || 0;
                var absent = parseFloat(document.getElementById("absent").value) || 0;
                var total = reserved - absent;

                document.getElementById("conducted").value = total;
            }
            calculate();
        });

        // Validation
        var inputsError = document.getElementById("errorMessage");
        var button = document.getElementById("button");

        var week = document.getElementById("week");
        var reserved = document.getElementById("reserved");
        var absent = document.getElementById("absent");
        var conducted = document.getElementById("conducted");

        week.addEventListener("change", function() {
            const inputValue = week.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                week.style.border = "2px solid red";
                inputsError.innerHTML = "The week must be only Numbers";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else if (inputValue == 0) {
                week.style.border = "2px solid red";
                inputsError.innerHTML = "The week is empty";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else {
                week.style.border = "2px solid green";
                button.style.display = "block";
                inputsError.innerHTML = "";
            }
        });

        reserved.addEventListener("keyup", function() {
            const inputValue = reserved.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                reserved.style.border = "2px solid red";
                inputsError.innerHTML = "The reserved classes must be only Numbers";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else if (inputValue == "") {
                reserved.style.border = "2px solid red";
                inputsError.innerHTML = "The reserved classes is empty";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else {
                reserved.style.border = "2px solid green";
                button.style.display = "block";
                inputsError.innerHTML = "";
            }
        });

        absent.addEventListener("keyup", function() {
            const inputValue = absent.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                absent.style.border = "2px solid red";
                inputsError.innerHTML = "The absent classes must be only Numbers";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else if (inputValue == "") {
                absent.style.border = "2px solid red";
                inputsError.innerHTML = "The absent classes is empty";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else {
                absent.style.border = "2px solid green";
                button.style.display = "block";
                inputsError.innerHTML = "";
            }
        });

        conducted.addEventListener("keyup", function() {
            const inputValue = conducted.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                conducted.style.border = "2px solid red";
                inputsError.innerHTML = "The conducted classes must be only Numbers";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else if (inputValue == "") {
                conducted.style.border = "2px solid red";
                inputsError.innerHTML = "The conducted classes is empty";
                inputsError.style.color = "red";
                button.style.display = "none";
            } else {
                conducted.style.border = "2px solid green";
                button.style.display = "block";
                inputsError.innerHTML = "";
            }
        });
    </script>
</x-app-layout>
