<x-app-layout>

    <x-slot name="header">
        <div class="row">
            <h2 class="col-5 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
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
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-center mb-3" style="font-size: 20px;font-weight: bold;">All Classes
                    </p>
                    {{-- Table --}}
                    <div style="overflow: auto;">
                        <table class="table table-striped text-center">
                            <thead class="border-2">
                                <tr>
                                    <th>Num</th>
                                    <th>Date</th>
                                    <th>Week</th>
                                    <th>Reserved classes</th>
                                    <th>Absent classes</th>
                                    <th>Conducted Classes</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $class)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $class->created_at->toDateString() }}</td>
                                        <td>{{ $class->week }}</td>
                                        <td>{{ $class->reserved }}</td>
                                        <td>{{ $class->absent }}</td>
                                        <td>{{ $class->conducted }}</td>
                                        <td>{{ $class->tutors_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
