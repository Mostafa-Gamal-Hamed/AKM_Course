@extends('user.layout')

@section('Title')
    {{ __('messages.Contact us') }}
@endsection

<style>
    /* Header */
    header {
        height: 500px !important;
        margin-bottom: 20px;
    }

    header img {
        object-fit: cover;
    }

    /* choose */
    .choose {
        padding: 1rem 1rem 5rem 1rem;
        transition: 0.5s ease-in-out;
    }

    .choose:hover {
        transform: translatey(-15px);
    }

    /* findTutor */
    .findTutor {
        display: none;
    }
</style>

@section('Body')
    {{-- Header --}}
    <header>
        <img src="{{ asset('images/contactUs.jpg') }}" height="100%" width="100%" alt="Blog">
    </header>

    {{-- Find Tutor & Become Tutor --}}
    <h3 class="text-center mb-5">{{ __('messages.How would you like to get in touch with us?') }}</h3>

    <div class="container mb-5">
        <div class="d-flex flexColumn justify-content-center grid gap-4">
            <div class="choose bg-light shadow text-center rounded d-flex flex-column grid gap-2 position-relative"
                style="max-width: 300px; height:auto;">
                <h4 class="fw-bold">{{ __('messages.Become a Tutor') }}</h4>
                <img src="{{ asset('images/contactTutor.jpg') }}" height="35%" width="100%" alt="">
                <p class="mt-3">
                    {{ __('messages.Are you interested in becoming a tutor on AKM? Fill out the application form to join our community.') }}
                </p>
                <a href="{{ url('becomeTutor') }}"
                    class="btn btn-dark w-75 position-absolute bottom-0 start-50 translate-middle">{{ __('messages.Become a Tutor') }}</a>
            </div>
            <div class="choose bg-light shadow text-center rounded d-flex flex-column grid gap-2 position-relative"
                style="max-width: 300px; height:auto;">
                <h4 class="fw-bold">{{ __('messages.Find a tutor') }}</h4>
                <img src="{{ asset('images/contactShild.jpg') }}" height="35%" width="100%" alt="">
                <p class="mt-3">
                    {{ __('messages.Please fill the callback form and our team will get back to you shortly.') }}</p>
                <button id="findTutorButton"
                    class="btn btn-success w-75 position-absolute bottom-0 start-50 translate-middle">{{ __('messages.Contact us') }}</button>
            </div>
        </div>
    </div>

    {{-- Find tutor --}}
    <div class="findTutor container mb-5 shadow bg-light p-3" id="findTutor">
        <form action="{{ route('contactUs') }}" method="post" class="w-75 m-auto">
            @csrf
            <h3 class="text-center fw-bold">{{ __('messages.Find a tutor') }}</h3>
            {{-- Name --}}
            <div class="row">
                {{-- First Name --}}
                <div class="col form-floating mb-3">
                    <input type="text" name="firstName" class="form-control" value="{{ old('firstName') }}"
                        id="firstName" placeholder="First Name" autocomplete="on" minlength="3" required>
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
                    <input type="text" name="lastName" class="form-control" value="{{ old('lastName') }}" id="lastName"
                        placeholder="Last Name" autocomplete="on" minlength="3" required>
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
                    placeholder="02 01234567890" minlength="9" maxlength="13" autocomplete="on" required>
                <label for="number">{{ __('messages.Your Number') }}</label>
                {{-- Errors Messages start --}}
                <span id="numberError"></span>
                @error('number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Message --}}
            <div class="form-floating mb-4">
                <textarea class="form-control" name="message" placeholder="Leave a comment here" id="message" @required(true)>{{ old('message') }}</textarea>
                <label for="message">{{ __('messages.How Can We Assist You?') }}</label>
                {{-- Errors Messages start --}}
                <span id="messageError"></span>
                @error('message')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">{{ __('messages.Submit') }}</button>
        </form>
    </div>

    {{-- Validation --}}
    <script>
        $(document).ready(function() {
            // Show "findTutor" on button click with animation
            $("#findTutorButton").click(function() {
                $("#findTutor").show(500);
            });

            // Validation
            @if ($errors->any())
                @foreach ($errors->keys() as $error)
                    $("input[name='{{ $error }}']").css("border", "2px solid red");
                    $("textarea[name='{{ $error }}']").css("border", "2px solid red");
                @endforeach
            @endif
            // Reusable function for validation
            function handleValidation($input, $msg, condition, errorMsg) {
                if (condition) {
                    $input.css("border", "2px solid red");
                    $msg.text(errorMsg).css("color", "red");
                } else {
                    $input.css("border", "2px solid green");
                    $msg.text("");
                }
            }

            // Validate name inputs (firstName and lastName)
            function validateName($input, $msg) {
                const inputValue = $input.val();
                const hasNumber = /\d/.test(inputValue);
                handleValidation($input, $msg, hasNumber || inputValue.length < 3, hasNumber ?
                    "{{ __('messages.Only Letters') }}" :
                    "{{ __('messages.Must be at least 3 characters') }}");
            }

            // Validate email
            function validateEmail($input, $msg) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const value = $input.val();
                handleValidation($input, $msg, value === "" || !emailRegex.test(value), value === "" ?
                    "{{ __('messages.Email cannot be empty') }}" : "{{ __('messages.Invalid email format') }}"
                    );
            }

            // Validate number
            function validateNumber($input, $msg) {
                const value = $input.val();
                handleValidation($input, $msg, isNaN(value) || value.length < 9 || value.length > 13, isNaN(value) ?
                    "{{ __('messages.Only Numbers') }}" : "{{ __('messages.Must be 9-13 digits') }}");
            }

            // Validate message (allow only letters)
            function validateMessage($input, $msg) {
                const value = $input.val();
                const hasNumber = /\d/.test(value);
                handleValidation($input, $msg, hasNumber || value === "", hasNumber ?
                    "{{ __('messages.Only Letters') }}" :
                    "{{__('messages.Message cannot be empty')}}");
            }

            // Apply validations on keyup events
            $("#firstName, #lastName").on("keyup", function() {
                validateName($(this), $("#" + $(this).attr('id') + "{{ __('messages.Error') }}"));
            });

            $("#email").on("keyup", function() {
                validateEmail($(this), $("#emailError"));
            });

            $("#number").on("keyup", function() {
                validateNumber($(this), $("#numberError"));
            });

            $("#message").on("keyup", function() {
                validateMessage($(this), $("#messageError"));
            });
        });
    </script>
@endsection
