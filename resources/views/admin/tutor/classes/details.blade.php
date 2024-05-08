@extends('admin.layout')

@section('Title')
    {{ $class->tutors_name }} Details
@endsection

@section('Body')
    <h3 class="text-dark text-center font-weight-bold mb-5">{{ $class->tutors_name }}</h3>
    <div class="container mb-5">
        <form action="{{ route('classUpdate', "$class->id") }}" method="post">
            @csrf
            @method("PUT")

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
                            <select name="week" class="custom-select m-auto rounded numeric-input" id="week" required>
                                <option value="{{ $class->week }}" hidden>Week {{ $class->week }}</option>
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
                            <input type="number" name="reserved" class="form-control w-75 m-auto rounded numeric-input"
                                value="{{ $class->reserved }}" id="reserved" required>
                            @error('reserved')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </td>
                        <td>
                            <input type="number" name="absent" class="form-control w-75 m-auto rounded numeric-input"
                                value="{{ $class->absent }}" id="absent" required>
                            @error('absent')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </td>
                        <td>
                            <input type="number" name="conducted" class="form-control w-75 m-auto rounded numeric-input"
                                value="{{ $class->conducted }}" id="conducted" readonly required>
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
@endsection
