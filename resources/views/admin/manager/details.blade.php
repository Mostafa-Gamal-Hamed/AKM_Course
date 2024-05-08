@extends('admin.layout')

@section('Title')
    {{ $user->name }} Details
@endsection

@section('Body')
    <h3 class="text-dark text-center font-weight-bold mb-5">{{ $user->name }}</h3>
    <div class="container mb-5">
        <div class="tutorDetails">
            {{-- Edit --}}
            <div class="w-100 mx-2">
                <div class="shadow p-3">
                    <form action="{{ route('userUpdate', "$user->id") }}" method="post">
                        @csrf
                        @method('PUT')
                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                id="name" placeholder="Full Name">
                            {{-- Errors Messages start --}}
                            <span id="nameError"></span>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                id="email" placeholder="Email">
                            {{-- Errors Messages start --}}
                            <span id="emailError"></span>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="payment">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="xxxxx">
                            {{-- Errors Messages start --}}
                            <span id="passwordError"></span>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Confirm password --}}
                        <div class="mb-3">
                            <label for="password">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="confirmation"
                                placeholder="xxxxx">
                            {{-- Errors Messages start --}}
                            <span id="confirmationError"></span>
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3" id="button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script>
        // Catch
        var fullName = document.getElementById("name");
        var fullNameError = document.getElementById("nameError");

        var email = document.getElementById("email");
        var emailError = document.getElementById("emailError");

        var password = document.getElementById("password");
        var passwordError = document.getElementById("passwordError");

        var confirmation = document.getElementById("confirmation");
        var confirmationError = document.getElementById("confirmationError");

        var type = document.getElementById("type");
        var typeError = document.getElementById("typeError");

        // Name
        fullName.addEventListener("keyup", function() {
            const inputValue = fullName.value;
            const regex = /\d/;

            // Check if has less than 3 char or has a number
            if (regex.test(inputValue)) {
                fullName.style.border = "2px solid red";
                fullNameError.innerHTML = "Only Letters";
                fullNameError.style.color = "red";
            } else if (inputValue.length < 3) {
                fullName.style.border = "2px solid red";
                fullNameError.innerHTML = "Name must be more than 3 characters";
                fullNameError.style.color = "red";
            } else if (inputValue === "") {
                fullName.style.border = "2px solid red";
                fullNameError.innerHTML = "Empty";
                fullNameError.style.color = "red";
            } else {
                fullName.style.border = "2px solid green";
                fullNameError.innerHTML = "";
            }
        });

        // Email
        email.addEventListener("keyup", function() {
            const inputValue = email.value;

            // Check if empty
            if (inputValue === "") {
                email.style.border = "2px solid red";
                emailError.innerHTML = "Empty";
                emailError.style.color = "red";
            } else {
                email.style.border = "2px solid green";
                emailError.innerHTML = "";
            }
        });

        // Password
        password.addEventListener("keyup", function() {
            const inputValue = password.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                password.style.border = "2px solid red";
                passwordError.innerHTML = "Only Numbers";
                passwordError.style.color = "red";
            } else if (inputValue === "") {
                password.style.border = "2px solid red";
                passwordError.innerHTML = "Empty";
                passwordError.style.color = "red";
            } else if (inputValue.length < 8) {
                password.style.border = "2px solid red";
                passwordError.innerHTML = "The number less than 8 numbers";
                passwordError.style.color = "red";
            } else {
                password.style.border = "2px solid green";
                passwordError.innerHTML = "";
            }
        });

        // Confirm password
        confirmation.addEventListener("keyup", function() {
            const inputValue = confirmation.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                confirmation.style.border = "2px solid red";
                confirmationError.innerHTML = "Only Numbers";
                confirmationError.style.color = "red";
            } else if (inputValue === "") {
                confirmation.style.border = "2px solid red";
                confirmationError.innerHTML = "Empty";
                confirmationError.style.color = "red";
            } else if (inputValue.length < 8) {
                confirmation.style.border = "2px solid red";
                confirmationError.innerHTML = "The number less than 8 numbers";
                confirmationError.style.color = "red";
            } else if (inputValue !== password.value) {
                confirmation.style.border = "2px solid red";
                confirmationError.innerHTML = "Confirm password not match with password";
                confirmationError.style.color = "red";
            } else {
                confirmation.style.border = "2px solid green";
                confirmationError.innerHTML = "";
            }
        });

        // Type
        type.addEventListener("keyup", function() {
            const inputValue = type.value;

            // Check if not a male or female
            if (inputValue != "admin" && inputValue != "student" && inputValue != "tutor") {
                type.style.border = "2px solid red";
                typeError.innerHTML = "It must be admin,student or tutor only";
                typeError.style.color = "red";
            } else if (inputValue === "") {
                type.style.border = "2px solid red";
                typeError.innerHTML = "Empty";
                typeError.style.color = "red";
            } else {
                type.style.border = "2px solid green";
                typeError.innerHTML = "";
                buttonError.innerHTML = "";
                button.style.display = "block";
            }
        });
    </script>
@endsection
