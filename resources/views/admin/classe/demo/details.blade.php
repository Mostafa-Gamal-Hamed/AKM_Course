@extends('admin.layout')

@section('Title')
    {{ $class->firstName }} class
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">Edit {{ $class->firstName }} Class</h1>
    <div class="container">
        <form action="{{ route('updateClass',"$class->id") }}" method="post" class="w-75 m-auto">
            @csrf
            @method("PUT")
            {{-- Name --}}
            <div class="row">
                {{-- First Name --}}
                <div class="col form-floating mb-3">
                    <label for="firstName">{{ __('messages.First Name') }}</label>
                    <input type="text" name="firstName" class="form-control" value="{{ $class->firstName }}" id="firstName"
                        placeholder="First Name" minlength="3" autocomplete="on" required>
                    {{-- Errors Messages start --}}
                    <span id="firstError"></span>
                    @error('firstName')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Last Name --}}
                <div class="col form-floating mb-3">
                    <label for="lastName">{{ __('messages.Last Name') }}</label>
                    <input type="text" name="lastName" class="form-control" value="{{ $class->lastName }}" id="lastName"
                        placeholder="Last Name" minlength="3" autocomplete="on" required>
                    {{-- Errors Messages start --}}
                    <span id="lastError"></span>
                    @error('lastName')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
            </div>
            {{-- Email --}}
            <div class="form-floating mb-3">
                <label for="email">{{ __('messages.Your Email') }}</label>
                <input type="email" name="email" class="form-control" value="{{ $class->email }}" id="email"
                    placeholder="name@gmail.com" autocomplete="on" required>
                {{-- Errors Messages start --}}
                <span id="emailError"></span>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            {{-- Phone --}}
            <div class="form-floating mb-3">
                <label for="number">{{ __('messages.Your Number') }}</label>
                <input type="number" name="number" class="form-control" value="{{ $class->number }}" id="number"
                    placeholder="02 01234567890" min="9" autocomplete="on" required>
                {{-- Errors Messages start --}}
                <span id="numberError"></span>
                @error('number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Time --}}
            <div class="form-floating mb-4">
                <label for="dateTime">{{ __('messages.Shoes best time for demo class') }}</label>
                <input type="datetime-local" name="dateTime" value="{{ $class->dateTime }}" class="form-control"
                    id="dateTime" required>
                {{-- Errors Messages start --}}
                <span id="dateTimeError"></span>
                @error('dateTime')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            {{-- Status --}}
            <div class="form-floating mb-4">
                <select name="status" class="custom-select" id="status">
                    <option value="{{ $class->status }}" hidden>{{ $class->status }}</option>
                    <option value="waiting">Waiting</option>
                    <option value="done">Done</option>
                </select>
                {{-- Errors Messages start --}}
                <span id="statusError"></span>
                @error('status')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

    {{-- <script>
        // JS
        const firstName = document.getElementById("firstName");
        const firstMSG = document.getElementById("firstError");

        const email = document.getElementById("email");
        const emailMSG = document.getElementById("emailError");

        const lastName = document.getElementById("lastName");
        const lastMSG = document.getElementById("lastError");

        const number = document.getElementById("number");
        const numberMSG = document.getElementById("numberError");

        const dateTime = document.getElementById("dateTime");
        const dateTimeMSG = document.getElementById("dateTimeError");

        const status = document.getElementById("status");
        const statusMSG = document.getElementById("statusError");

        //// Validation

        // First name
        firstName.addEventListener("keyup", function() {
            const inputValue = firstName.value;
            const regex = /\d/;

            // Check if has less than 3 char or has a number
            if (regex.test(inputValue)) {
                firstName.style.border = "2px solid red";
                firstMSG.innerHTML = "Only Letters";
                firstMSG.style.color = "red";
            } else if (inputValue.length < 3) {
                firstName.style.border = "2px solid red";
                firstMSG.style.color = "red";
                firstMSG.innerHTML = "must be 3 letters or more";
            } else {
                firstName.style.border = "2px solid green";
                firstMSG.innerHTML = "";
            }
        });

        // Last name
        lastName.addEventListener("keyup", function() {
            const inputValue = lastName.value;
            const regex = /\d/;

            // Check if has less than 3 char or has a number
            if (regex.test(inputValue)) {
                lastName.style.border = "2px solid red";
                lastMSG.innerHTML = "Only Letters";
                lastMSG.style.color = "red";
            } else if (inputValue.length < 3) {
                lastName.style.border = "2px solid red";
                lastMSG.style.color = "red";
                lastMSG.innerHTML = "must be 3 letters or more";
            } else {
                lastName.style.border = "2px solid green";
                lastMSG.innerHTML = "";
            }
        });

        // Email
        email.addEventListener("keyup", function() {
            const inputValue = email.value;
            const regex = /\d/;

            // Check if has less than 3 char or has a number
            if (inputValue == "") {
                email.style.border = "2px solid red";
                emailMSG.innerHTML = "Empty";
                emailMSG.style.color = "red";
            } else {
                email.style.border = "2px solid green";
                emailMSG.innerHTML = "";
            }
        });

        // Phone
        number.addEventListener("keyup", function() {
            const inputValue = number.value;
            if (isNaN(inputValue)) {
                number.style.border = "2px solid red";
                numberMSG.innerHTML = "Only Numbers";
                numberMSG.style.color = "red";
            } else if (inputValue.length < 9 || inputValue.length > 13) {
                number.style.border = "2px solid red";
                numberMSG.innerHTML = "must be 9 or 13 numbers";
                numberMSG.style.color = "red";
            } else {
                number.style.border = "2px solid green";
                numberMSG.innerHTML = "";
            }
        });

        // Date
        dateTime.addEventListener("input", function() {
            const inputValue = dateTime.value;
            if (isValidDate(inputValue)) {
                dateTime.style.border = "2px solid green";
                dateTimeMSG.innerHTML = "";
            } else {
                dateTime.style.border = "2px solid red";
                dateTimeMSG.textContent = "This is not a valid date and time";
                dateTimeMSG.style.color = "red";
            }
        });
        function isValidDate(dateString) {
            let dateTime = new Date(dateString);
            return !isNaN(dateTime.getTime());
        }

        // Gender
        status.addEventListener("change", function() {
            const inputValue = status.value;

            // Check if not a male or female
            if (inputValue != "waiting" && inputValue != "done") {
                status.style.border = "2px solid red";
                statusError.innerHTML = "It must be waiting or done only";
                statusError.style.color = "red";
            } else if (inputValue === "") {
                status.style.border = "2px solid red";
                statusError.innerHTML = "Empty";
                statusError.style.color = "red";
            } else {
                status.style.border = "2px solid green";
                statusError.innerHTML = "";
            }
        });
    </script> --}}

@endsection
