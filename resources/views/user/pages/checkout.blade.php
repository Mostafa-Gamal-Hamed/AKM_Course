@extends('user.layout')

@section('Title')
    {{ __('messages.checkout') }}
@endsection

<style>
    .header {
        margin-top: 100px;
        font-weight: bold;
    }

    .left {
        transition: 0.5s ease-in-out;
    }

    .left:hover {
        font-size: 25px;
    }

    .showPricing {
        background-color: white;
    }
</style>

@section('Body')
    {{-- Header --}}
    <h1 class="text-center mt-5 mb-5">{{ __('messages.checkout') }}</h1>

    <div class="container">
        <div class="row flexColumn justify-content-between">
            <div class="col-4 column text-center mb-5">
                <div class="shadow border p-3 text-center rounded mb-4 column showPricing">
                    <h2 class="fw-bold">{{ __('messages.Your Plan') }}</h2>
                    <div>
                        {{-- Name --}}
                        <h4 class="fw-bold">{{ __("messages.$plan->name") }}</h4>
                        {{-- Comment --}}
                        @if ($plan->comment != null)
                            <p class="text-info">{{ __("messages.$plan->comment") }}</p>
                        @endif
                        {{-- Price & OfferPrice --}}
                        @if ($plan->offerPrice != null)
                            @if (session()->get('lang') == 'ar')
                                @if ($currency === '$')
                                    <h5 class="text-danger">{{ __("messages.$currency") }}<del>{{ $plan->price }}</del></h5>
                                    <h4 class="text-primary">{{ __("messages.$currency") }}{{ $plan->offerPrice }}</h4>
                                @else
                                    <h5 class="text-danger"><del>{{ $plan->price }}</del>{{ __("messages.$currency") }}
                                    </h5>
                                    <h4 class="text-primary">{{ $plan->offerPrice }}{{ __("messages.$currency") }}</h4>
                                @endif
                            @else
                                <h5 class="text-danger">{{ __("messages.$currency") }}<del>{{ $plan->price }}</del></h5>
                                <h4 class="text-primary">{{ __("messages.$currency") }}{{ $plan->offerPrice }}</h4>
                            @endif
                        @else
                            @if (session()->get('lang') == 'ar')
                                <h4 class="text-primary">{{ $plan->price }}{{ __("messages.$currency") }}</h4>
                            @else
                                <h4 class="text-primary">{{ __("messages.$currency") }}{{ $plan->price }}</h4>
                            @endif
                        @endif
                        {{-- Month --}}
                        <h5 class="bg-secondary text-light p-2">{{ $plan->month }}/{{ __('messages.month') }}
                        </h5>
                        {{-- Type --}}
                        <p class="p-2" style="background-color: rgb(230 230 230);">
                            {{ __("messages.$plan->type") }}</p>
                        {{-- Session --}}
                        <p class="bg-warning text-dark p-2">{{ $plan->sessions }}
                            {{ __('messages.sessions') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-8 column text-center">
                <form action="{{ route('payment', "$plan->id") }}" method="post" class="shadow bg-light p-3 rounded">
                    @csrf
                    <h2 class="text-center fw-bold">{{ __('messages.Billing details') }}</h2>
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
                            <input type="text" name="lastName" class="form-control" value="{{ old('lastName') }}"
                                id="lastName" placeholder="Last Name" autocomplete="on" minlength="3" required>
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
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            id="email" placeholder="name@gmail.com" autocomplete="on" required>
                        <label for="email">{{ __('messages.Your Email') }}</label>
                        {{-- Errors Messages start --}}
                        <span id="emailError"></span>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Phone --}}
                    <div class="form-floating mb-3">
                        <input type="number" name="number" class="form-control" value="{{ old('number') }}"
                            id="number" placeholder="02 01234567890" minlength="9" maxlength="13" autocomplete="on"
                            required>
                        <label for="number">{{ __('messages.Your Number') }}</label>
                        {{-- Errors Messages start --}}
                        <span id="numberError"></span>
                        @error('number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        {{-- Errors Messages end --}}
                    </div>
                    {{-- Type --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="type" class="form-control" value="{{ $plan->type }}"
                            id="type" placeholder="type" hidden readonly autocomplete="on" minlength="3" required>
                        {{-- Errors Messages start --}}
                        <span id="typeError"></span>
                        @error('type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        {{-- Errors Messages end --}}
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('messages.continue') }}</button>
                </form>
            </div>
        </div>
        <div id="fh5co-pricing">
            <div class="container">
                <div class="text-center shadow bg-light p-4">
                    <h3 class="mt-5 mb-5">
                        {{ __('messages.Or contact us on:') }}
                    </h3>
                    <div class="row mb-5">
                        <div class="col">
                            <h5>{{ __('messages.Whats app') }}</h5>
                            <a href="https://wa.me/201066266189" target="_blank">
                                <img src="{{ asset('images/whatap.png') }}" width="90px" target="_blank" alt="Whats App">
                            </a>
                        </div>
                        <div class="col">
                            <h5>{{ __('messages.Email') }}</h5>
                            <a href="mailto:hr@akmcourse.com" target="_blank">
                                <img src="{{ asset('images/Gmail.png') }}" width="90px" alt="Gmail">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Validation --}}
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                @foreach ($errors->keys() as $error)
                    $("input[name='{{ $error }}']").css("border", "2px solid red");
                @endforeach
            @endif
            // Reusable function for border and message handling
            function handleValidation($input, $msg, condition, errorMsg) {
                if (condition) {
                    $input.css("border", "2px solid red");
                    $msg.text(errorMsg).css("color", "red");
                } else {
                    $input.css("border", "2px solid green");
                    $msg.text("");
                }
            }

            // First and Last Name validation
            function validateName($input, $msg) {
                const value = $input.val();
                const hasNumber = /\d/.test(value);
                handleValidation($input, $msg, hasNumber || value.length < 3, hasNumber ?
                    "{{ __('messages.Only Letters') }}" :
                    "{{ __('messages.Must be at least 3 characters') }}");
            }

            // Email validation
            function validateEmail($input, $msg) {
                const value = $input.val();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (value === "") {
                    handleValidation($input, $msg, true, "{{ __('messages.Email cannot be empty') }}");
                } else if (!emailRegex.test(value)) {
                    handleValidation($input, $msg, true, "{{ __('messages.Invalid email format') }}");
                } else {
                    handleValidation($input, $msg, false, "");
                }
            }

            // Number validation
            function validateNumber($input, $msg) {
                const value = $input.val();
                handleValidation($input, $msg, isNaN(value) || value.length < 9 || value.length > 13, isNaN(value) ?
                    "{{ __('messages.Only Numbers') }}" : "{{ __('messages.Must be 9-13 digits') }}");
            }

            // Type validation
            function validateType($input, $msg) {
                handleValidation($input, $msg, $input.val() === "",
                    "{{ __('messages.This field cannot be empty') }}");
            }

            // Apply validations on keyup
            $("#firstName, #lastName").on("keyup", function() {
                validateName($(this), $("#" + $(this).attr('id') + "{{ __('messages.Error') }}"));
            });

            $("#email").on("keyup", function() {
                validateEmail($(this), $("#emailError"));
            });

            $("#number").on("keyup", function() {
                validateNumber($(this), $("#numberError"));
            });

            $("#type").on("keyup", function() {
                validateType($(this), $("#typeError"));
            });
        });
    </script>
@endsection
