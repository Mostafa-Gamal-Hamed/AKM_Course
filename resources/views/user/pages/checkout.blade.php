@extends('user.layout')

@section('Title')
    {{__("messages.checkout")}}
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
    <h1 class="header text-center">{{__("messages.checkout")}}</h1>
    <div class="container">
        <div class="row flexColumn justify-content-between">
            <div class="col-4 column text-center mb-5">
                <div class="shadow border p-3 text-center rounded mb-4 column showPricing">
                    <h2 class="fw-bold">{{__("messages.Your Plan")}}</h2>
                    <div>
                        {{-- Name --}}
                        <h4 class="fw-bold">{{ __("messages.$plan->name") }}</h4>
                        {{-- Comment --}}
                        @if ($plan->comment != null)
                            <p class="text-info">{{ __("messages.$plan->comment") }}</p>
                        @endif
                        {{-- Price & OfferPrice --}}
                        @if ($plan->offerPrice != null)
                            <h5 class="text-danger">EGP <del>{{ $plan->price }}</del></h5>
                            <h4 class="text-primary">EGP{{ $plan->offerPrice }}</h4>
                        @else
                            <h4 class="text-primary">EGP{{ $plan->offerPrice }}</h4>
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
                <form action="{{ route("checkout","$plan->id") }}" method="post" class="shadow bg-light p-3 rounded">
                    @csrf
                    <h2 class="text-center fw-bold">{{__("messages.Billing details")}}</h2>
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

                    <button type="submit" class="btn btn-success">{{__("messages.continue")}}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JS
        const firstName = document.getElementById("firstName");
        const firstMSG  = document.getElementById("firstError");

        const email = document.getElementById("email");
        const emailMSG  = document.getElementById("emailError");

        const lastName  = document.getElementById("lastName");
        const lastMSG   = document.getElementById("lastError");

        const number = document.getElementById("number");
        const numberMSG = document.getElementById("numberError");

        const message = document.getElementById("message");
        const messageMSG = document.getElementById("messageError");

        //// Validation

        firstName.addEventListener("keyup", function() {
            const inputValue = firstName.value;
            const regex = /\d/;

            // Check if has less than 3 char or has a number
            if(regex.test(inputValue)){
                firstName.style.border = "2px solid red";
                firstMSG.innerHTML     = "Only Letters";
                firstMSG.style.color   = "red";
            }else if (inputValue.length < 3) {
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
            if(regex.test(inputValue)){
                lastName.style.border = "2px solid red";
                lastMSG.innerHTML     = "Only Letters";
                lastMSG.style.color   = "red";
            }else if (inputValue.length < 3) {
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
                emailMSG.innerHTML     = "Empty";
                emailMSG.style.color   = "red";
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
            }else if(inputValue.length < 10 || inputValue.length > 11) {
                number.style.border = "2px solid red";
                numberMSG.innerHTML = "must be 9 or 13 numbers";
                numberMSG.style.color = "red";
            } else {
                number.style.border = "2px solid green";
                numberMSG.innerHTML = "";
            }
        });

        message.addEventListener("keyup", function() {
            const inputValue = message.value;
            const regex = /\d/;

            if(regex.test(inputValue)){
                message.style.border = "2px solid red";
                messageMSG.innerHTML     = "Only Letters";
                messageMSG.style.color   = "red";
            }else if (inputValue == "") {
                message.style.border = "2px solid red";
                messageMSG.style.color   = "red";
                messageMSG.innerHTML     = "Empty";
            } else {
                message.style.border = "2px solid green";
                messageMSG.innerHTML = "";
            }
        });
    </script>

@endsection
