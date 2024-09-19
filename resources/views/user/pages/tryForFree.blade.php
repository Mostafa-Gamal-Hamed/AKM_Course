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
                            id="firstName" placeholder="First Name" minlength="3" autocomplete="on" minlength="3" required>
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
                            id="lastName" placeholder="Last Name" minlength="3" autocomplete="on" minlength="3" required>
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
                    <label for="dateTime">{{ __('messages.Shoes best time for demo class') }}</label>
                    {{-- Errors Messages start --}}
                    <span id="dateTimeError"></span>
                    @error('dateTime')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">{{ __('messages.Send') }}</button>
            </form>
        </div>
    </div>

    {{-- Validation --}}
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                @foreach ($errors->keys() as $error)
                    $("input[name='{{ $error }}']").css("border", "2px solid red");
                    $("textarea[name='{{ $error }}']").css("border", "2px solid red");
                @endforeach
            @endif

            // jQuery
            const firstMSG = $("#firstError");
            const emailMSG = $("#emailError");
            const lastMSG = $("#lastError");
            const numberMSG = $("#numberError");
            const dateTimeMSG = $("#dateTimeError");

            // First Name Validation
            $("#firstName").on("keyup", function() {
                const inputValue = $(this).val();
                const regex = /\d/;

                if (regex.test(inputValue)) {
                    $(this).css("border", "2px solid red");
                    firstMSG.text("{{ __('messages.Only Letters') }}").css("color", "red");
                } else if (inputValue.length < 3) {
                    $(this).css("border", "2px solid red");
                } else {
                    $(this).css("border", "2px solid green");
                    firstMSG.text("");
                }
            });

            // Last Name Validation
            $("#lastName").on("keyup", function() {
                const inputValue = $(this).val();
                const regex = /\d/;

                if (regex.test(inputValue)) {
                    $(this).css("border", "2px solid red");
                    lastMSG.text("{{ __('messages.Only Letters') }}").css("color", "red");
                } else if (inputValue.length < 3) {
                    $(this).css("border", "2px solid red");
                } else {
                    $(this).css("border", "2px solid green");
                    lastMSG.text("");
                }
            });

            // Email Validation
            $("#email").on("keyup", function() {
                const inputValue = $(this).val();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (inputValue === "") {
                    $(this).css("border", "2px solid red");
                    emailMSG.text("{{ __('messages.Email cannot be empty') }}").css("color", "red");
                } else if (!emailPattern.test(inputValue)) {
                    $(this).css("border", "2px solid red");
                    emailMSG.text("{{ __('messages.Invalid email format') }}").css("color", "red");
                } else {
                    $(this).css("border", "2px solid green");
                    emailMSG.text("");
                }
            });

            // Phone Number Validation
            $("#number").on("keyup", function() {
                const inputValue = $(this).val();

                if (isNaN(inputValue)) {
                    $(this).css("border", "2px solid red");
                    numberMSG.text("{{ __('messages.Only Numbers') }}").css("color", "red");
                } else if (inputValue.length < 9 || inputValue.length > 13) {
                    $(this).css("border", "2px solid red");
                    numberMSG.text("{{ __('messages.Must be 9-13 digits') }}").css("color", "red");
                } else {
                    $(this).css("border", "2px solid green");
                    numberMSG.text("");
                }
            });

            // Date and Time Validation
            $("#dateTime").on("input", function() {
                const inputValue = $(this).val();

                if (isValidDate(inputValue)) {
                    $(this).css("border", "2px solid green");
                    dateTimeMSG.text("");
                } else {
                    $(this).css("border", "2px solid red");
                    dateTimeMSG.text("{{__('messages.This is not a valid date and time')}}").css("color", "red");
                }
            });

            function isValidDate(dateString) {
                const dateTime = new Date(dateString);
                return !isNaN(dateTime.getTime());
            }
        });
    </script>
@endsection
