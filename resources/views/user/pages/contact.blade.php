@extends('user.layout')

@section('Title')
    AKM Contact
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
    <h3 class="text-center mb-5">How would you like to get in touch with us?</h3>

    <div class="container mb-5">
        <div class="d-flex flexColumn justify-content-center grid gap-4">
            <div class="choose bg-light shadow text-center rounded d-flex flex-column grid gap-2 position-relative"
                style="max-width: 300px; height:auto;">
                <h4 class="fw-bold">Become a tutor</h4>
                <img src="{{ asset('images/contactTutor.jpg') }}" height="35%" width="100%" alt="">
                <p class="mt-3">Are you interested in becoming a tutor on AKM? Fill out the application form to join our
                    community.</p>
                <a href="{{ url('becomeTutor') }}"
                    class="btn btn-dark w-75 position-absolute bottom-0 start-50 translate-middle">Become tutor</a>
            </div>
            <div class="choose bg-light shadow text-center rounded d-flex flex-column grid gap-2 position-relative"
                style="max-width: 300px; height:auto;">
                <h4 class="fw-bold">Find a tutor</h4>
                <img src="{{ asset('images/contactShild.jpg') }}" height="35%" width="100%" alt="">
                <p class="mt-3">Please fill the callback form and our team will get back to you shortly.</p>
                <button id="findTutorButton"
                    class="btn btn-warning w-75 position-absolute bottom-0 start-50 translate-middle">Contact us</button>
            </div>
        </div>
    </div>

    {{-- Find tutor --}}
    <div class="findTutor container mb-5 shadow bg-light p-3" id="findTutor">
        <form action="{{ route('contactUs') }}" method="post" class="w-75 m-auto">
            @csrf
            <h3 class="text-center fw-bold">Find A Tutor</h3>
            <div class="row">
                {{-- First Name --}}
                <div class="col form-floating mb-3">
                    <input type="text" name="firstName" class="form-control" value="{{ old('firstName') }}"
                        id="firstName" placeholder="First Name" autocomplete="on" minlength="3" required>
                    <label for="firstName">First Name</label>
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
                    <label for="lastName">Last Name</label>
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
                <label for="email">Your Email</label>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            {{-- Phone --}}
            <div class="form-floating mb-3">
                <input type="number" name="number" class="form-control" value="{{ old('number') }}" id="number"
                    placeholder="02 01234567890" minlength="10" maxlength="12" autocomplete="on" required>
                <label for="number">Your Number</label>
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
                <label for="message">How Can We Assist You?</label>
                @error('message')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script>
        // Jquery
        $(document).ready(function() {
            // Display for contact
            $("#findTutorButton").click(function() {
                $("#findTutor").show(500);
            });
        });

        // JS
        const firstName = document.getElementById("firstName");
        const firstMSG  = document.getElementById("firstError");

        const lastName  = document.getElementById("lastName");
        const lastMSG   = document.getElementById("lastError");

        const number = document.getElementById("number");
        const numberMSG = document.getElementById("numberError");

        const message = document.getElementById("message");

        //// Validation
        // firstName
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
        // lastName
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
        // phone
        number.addEventListener("keyup", function() {
            const inputValue = number.value;
            if (isNaN(inputValue)) {
                number.style.border = "2px solid red";
                numberMSG.innerHTML = "Only Numbers";
                numberMSG.style.color = "red";
            }else if(inputValue.length < 10 || inputValue.length > 11) {
                number.style.border = "2px solid red";
                numberMSG.innerHTML = "must be 10 or 11 numbers";
                numberMSG.style.color = "red";
            } else {
                number.style.border = "2px solid green";
                numberMSG.innerHTML = "";
            }
        });
    </script>
@endsection
