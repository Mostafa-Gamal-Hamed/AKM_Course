@extends('user.layout')

@section('Title')
    {{ __('messages.Demo class') }}
@endsection

@section('Body')
    <div class="container">
        <h2 class="text-center m-5 fw-bold">{{ __('messages.Demo class') }}</h2>
        <div class="findTutor container mb-5 shadow bg-light p-3" id="findTutor">
            <form action="{{ route('demoClass') }}" method="post" class="w-75 m-auto">
                @csrf
                <h3 class="text-center fw-bold">{{ __('messages.! Try Free Class') }}</h3>
                {{-- Name --}}
                <div class="row">
                    {{-- First Name --}}
                    <div class="col form-floating mb-3">
                        <input type="text" name="firstName" class="form-control" value="{{ old('firstName') }}"
                            id="firstName" placeholder="First Name" minlength="3" autocomplete="on" required>
                        <label for="firstName">{{ __('messages.First Name') }}</label>
                        {{-- Errors Messages start --}}
                        <span id="firstError"></span>
                        @error('firstName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        {{-- Errors Messages end --}}
                    </div>
                    {{-- Last Name --}}
                    <div class="col form-floating mb-3">
                        <input type="text" name="lastName" class="form-control" value="{{ old('lastName') }}"
                            id="lastName" placeholder="Last Name" minlength="3" autocomplete="on" required>
                        <label for="lastName">{{ __('messages.Last Name') }}</label>
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
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email"
                        placeholder="name@gmail.com" autocomplete="on" required>
                    <label for="email">{{ __('messages.Your Email') }}</label>
                    {{-- Errors Messages start --}}
                    <span id="emailError"></span>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Phone --}}
                <div class="form-floating mb-3">
                    <input type="number" name="number" class="form-control" value="{{ old('number') }}" id="number"
                        placeholder="02 01234567890" min="9" autocomplete="on" required>
                    <label for="number">{{ __('messages.Your Number') }}</label>
                    {{-- Errors Messages start --}}
                    <span id="numberError"></span>
                    @error('number')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Time --}}
                <div class="form-floating mb-4">
                    <input type="datetime-local" name="dateTime" class="form-control" id="dateTime" required>
                    <label for="dateTime">{{__("messages.Shoes best time for demo class")}}</label>
                    {{-- Errors Messages start --}}
                    <span id="dateTimeError"></span>
                    @error('dateTime')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.Send') }}</button>
            </form>
        </div>
    </div>

    <script>
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

        //// Validation

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
            } else {
                firstName.style.border = "2px solid green";
                firstMSG.innerHTML = "";
            }
        });

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
            } else {
                lastName.style.border = "2px solid green";
                lastMSG.innerHTML = "";
            }
        });

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
    </script>
@endsection
