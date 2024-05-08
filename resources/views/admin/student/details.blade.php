@extends('admin.layout')

@section('Title')
    {{ $student->name }} Details
@endsection

@section('Body')
    <h3 class="text-dark text-center font-weight-bold mb-5">{{ $student->name }}</h3>
    <div class="container mb-5">
        <div class="tutorDetails d-flex">
            {{-- Image & Detals --}}
            <div class="w-100 mx-2">
                <div class="shadow p-3 mb-3">
                    <div class="text-center">
                        <img src=" {{ asset("storage/$student->image") }} " class="img-fluid rounded" width="300px"
                            alt="Tutor">
                    </div>
                    <hr>
                    <div>
                        <p>The Amount: {{ $student->amount }}</p>
                        <p>Payment type: {{ $student->payment }}</p>
                        <p>Paid day: {{ $student->Paid }}</p>
                        <p>Start Date: {{ $student->startDate }}</p>
                        <p>Level: {{ $student->level }}</p>
                    </div>
                </div>
            </div>
            {{-- Edit --}}
            <div class="w-100 mx-2">
                <div class="shadow p-3">
                    <form action="{{ route('studentUpdate', "$student->id") }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $student->name }}" class="form-control"
                                id="name" placeholder="Full Name" minlength="3" required>
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
                            <input type="email" name="email" value="{{ $student->email }}" class="form-control"
                                id="email" placeholder="Email" required>
                            {{-- Errors Messages start --}}
                            <span id="emailError"></span>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Number --}}
                        <label>Number</label>
                        <div class="row mb-3">
                            {{-- Country code --}}
                            <div class="col-5">
                                <select name="countryCode" class="custom-select" id="CountryCode">
                                    <option value="{{ $student->country_codes_id }}" hidden>
                                        {{ $student->countryCode->iso }} +{{ $student->countryCode->phonecode }}</option>
                                    @foreach ($countryCode as $code)
                                        <option value="{{ $code->id }}">{{ $code->iso }} +{{ $code->phonecode }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- Errors Messages start --}}
                                <span id="CountryCodeError"></span>
                                @error('countryCode')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                {{-- Errors Messages end --}}
                            </div>
                            {{-- Phone --}}
                            <div class="col-7">
                                <input type="number" name="phone" value="{{ $student->phone }}" class="form-control"
                                    id="phone" placeholder="Number" minlength="9" required>
                                {{-- Errors Messages start --}}
                                <span id="phoneError"></span>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                {{-- Errors Messages end --}}
                            </div>
                        </div>
                        {{-- Gender --}}
                        <div class="mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="custom-select" id="gender">
                                <option value="{{ $student->gender }}" hidden>{{ $student->gender }}</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                            {{-- Errors Messages start --}}
                            <span id="genderError"></span>
                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Country --}}
                        <div class="mb-3">
                            <label for="country">Country</label>
                            <input type="text" name="country" value="{{ $student->country }}" class="form-control"
                                id="country" placeholder="Country" required>
                            {{-- Errors Messages start --}}
                            <span id="countryError"></span>
                            @error('country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- City --}}
                        <div class="mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" value="{{ $student->city }}" class="form-control"
                                id="city" placeholder="City" required>
                            {{-- Errors Messages start --}}
                            <span id="cityError"></span>
                            @error('city')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Payment type --}}
                        <div class="mb-3">
                            <label for="payment">Payment Type</label>
                            <select name="payment" class="custom-select" id="payment">
                                <option value="{{ $student->payment }}" hidden>{{ $student->payment }}</option>
                                <option value="cash">Cash</option>
                                <option value="installment">Installment</option>
                            </select>
                            {{-- Errors Messages start --}}
                            <span id="paymentError"></span>
                            @error('payment')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Amount --}}
                        <div class="mb-3">
                            <label for="amount">The Amount</label>
                            <input type="number" name="amount" value="{{ $student->amount }}" id="studentAmount"
                                class="form-control" placeholder="The Amount" required>
                            {{-- Errors Messages start --}}
                            <span id="studentAmountError"></span>
                            @error('amount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- The remaining & Payment date --}}
                        <div class="mb-3">
                            <label for="remaining">The remaining</label>
                            <input type="number" name="remaining" value="{{ $student->remaining }}"
                                class="form-control" id="remaining" placeholder="The Remaining">
                            {{-- Errors Messages start --}}
                            <span id="remainingError"></span>
                            @error('remaining')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <br>
                            {{-- Errors Messages end --}}

                            {{-- The Payment date --}}
                            <label for="paymentDate">The date of payment</label>
                            <input type="date" name="paymentDate" value="{{ $student->paymentDate }}"
                                class="form-control" id="paymentDate" placeholder="Remaining date">
                            {{-- Errors Messages start --}}
                            <span id="paymentDateError"></span>
                            @error('paymentDate')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Paid day --}}
                        <div class="mb-3">
                            <label for="Paid">Paid day</label>
                            <input type="date" name="Paid" value="{{ $student->Paid }}" class="form-control"
                                id="Paid" placeholder="Paid day" required>
                            {{-- Errors Messages start --}}
                            <span id="PaidError"></span>
                            @error('Paid')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Start Date --}}
                        <div class="mb-3">
                            <label for="StartDate">Start Date</label>
                            <input type="date" name="startDate" value="{{ $student->startDate }}"
                                class="form-control" id="StartDate" placeholder="Start Date" required>
                            {{-- Errors Messages start --}}
                            <span id="StartDateError"></span>
                            @error('startDate')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Level --}}
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <input type="number" name="level" value="{{ $student->level }}" class="form-control"
                                id="level" placeholder="Level" required>
                            {{-- Errors Messages start --}}
                            <span id="levelError"></span>
                            @error('level')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Image --}}
                        <div class="mb-3">
                            <div class="mb-2">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                {{-- Errors Messages start --}}
                                <span id="imageError"></span>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                {{-- Errors Messages end --}}
                            </div>
                            {{-- Show image --}}
                            <div class="text-center" style="max-height: 150px; max-width: 150px;">
                                <img src="" id="imagePreview" class="rounded"
                                    style="width: 150px; height: 150px; object-fit: cover;" alt="Empty Image">
                            </div>
                        </div>
                        <div>
                            <span id="buttonError"></span><br>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3" id="button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Catch
        var fullName = document.getElementById("name");
        var fullNameError = document.getElementById("nameError");

        var email = document.getElementById("email");
        var emailError = document.getElementById("emailError");

        var CountryCode = document.getElementById("CountryCode");
        var CountryCodeError = document.getElementById("CountryCodeError");

        var phone = document.getElementById("phone");
        var phoneError = document.getElementById("phoneError");

        var gender = document.getElementById("gender");
        var genderError = document.getElementById("genderError");

        var country = document.getElementById("country");
        var countryError = document.getElementById("countryError");

        var city = document.getElementById("city");
        var cityError = document.getElementById("cityError");

        var payment = document.getElementById("payment");
        var paymentError = document.getElementById("paymentError");

        var amount = document.getElementById("studentAmount");
        var amountError = document.getElementById("studentAmountError");

        var remainingDiv = document.getElementById("remainingDiv");

        var remaining = document.getElementById("remaining");
        var remainingError = document.getElementById("remainingError");

        var paymentDate = document.getElementById("paymentDate");
        var paymentDateError = document.getElementById("paymentDateError");

        var Paid = document.getElementById("Paid");
        var PaidError = document.getElementById("PaidError");

        var StartDate = document.getElementById("StartDate");
        var StartDateError = document.getElementById("StartDateError");

        var level = document.getElementById("level");
        var levelError = document.getElementById("levelError");

        var image = document.getElementById("image");
        var imageError = document.getElementById("imageError");

        var all = document.getElementsByTagName("input");
        var button = document.getElementById("button");
        var buttonError = document.getElementById("buttonError");

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

        // Country code
        CountryCode.addEventListener("keyup", function() {
            const inputValue = CountryCode.value;

            // Check if not a number
            if (inputValue === "") {
                CountryCode.style.border = "2px solid red";
                CountryCodeError.innerHTML = "Empty";
                CountryCodeError.style.color = "red";
            } else {
                CountryCode.style.border = "2px solid green";
                CountryCodeError.innerHTML = "";
            }
        });

        // Phone
        phone.addEventListener("keyup", function() {
            const inputValue = phone.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                phone.style.border = "2px solid red";
                phoneError.innerHTML = "Only Numbers";
                phoneError.style.color = "red";
            } else if (inputValue === "") {
                phone.style.border = "2px solid red";
                phoneError.innerHTML = "Empty";
                phoneError.style.color = "red";
            } else if (inputValue.length < 9) {
                phone.style.border = "2px solid red";
                phoneError.innerHTML = "The number less than 9 numbers";
                phoneError.style.color = "red";
            } else {
                phone.style.border = "2px solid green";
                phoneError.innerHTML = "";
            }
        });

        // Gender
        gender.addEventListener("change", function() {
            const inputValue = gender.value;

            // Check if not a male or female
            if (inputValue != "male" && inputValue != "female") {
                gender.style.border = "2px solid red";
                genderError.innerHTML = "It must be male or female only";
                genderError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else if (inputValue === "") {
                gender.style.border = "2px solid red";
                genderError.innerHTML = "Empty";
                genderError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else {
                gender.style.border = "2px solid green";
                genderError.innerHTML = "";
                buttonError.innerHTML = "";
                button.style.display = "block";
            }
        });

        // Country
        country.addEventListener("keyup", function() {
            const inputValue = country.value;
            const regex = /\d/;

            // Check if string or not
            if (regex.test(inputValue)) {
                country.style.border = "2px solid red";
                countryError.innerHTML = "Only Letters";
                countryError.style.color = "red";
            } else if (inputValue === "") {
                country.style.border = "2px solid red";
                countryError.innerHTML = "Empty";
                countryError.style.color = "red";
            } else {
                country.style.border = "2px solid green";
                countryError.innerHTML = "";
            }
        });

        // City
        city.addEventListener("keyup", function() {
            const inputValue = city.value;
            const regex = /\d/;

            // Check if string or not
            if (regex.test(inputValue)) {
                city.style.border = "2px solid red";
                cityError.innerHTML = "Only Letters";
                cityError.style.color = "red";
            } else if (inputValue === "") {
                city.style.border = "2px solid red";
                cityError.innerHTML = "Empty";
                cityError.style.color = "red";
            } else {
                city.style.border = "2px solid green";
                cityError.innerHTML = "";
            }
        });

        // Payment
        payment.addEventListener("change", function() {
            const inputValue = payment.value;

            // Check if not a cash or installment
            if (inputValue != "cash" && inputValue != "installment") {
                payment.style.border = "2px solid red";
                paymentError.innerHTML = "It must be cash or installment only";
                paymentError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else if (inputValue == "installment") {
                remainingDiv.style.display = "block";
            } else if (inputValue == "") {
                payment.style.border = "2px solid red";
                paymentError.innerHTML = "Empty";
                paymentError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else {
                if (inputValue == "cash") {
                    remainingDiv.style.display = "none";
                }
                payment.style.border = "2px solid green";
                paymentError.innerHTML = "";
                buttonError.innerHTML = "";
                button.style.display = "block";
            }
        });

        // Amount
        amount.addEventListener("keyup", function() {
            const inputValue = amount.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                amount.style.border = "2px solid red";
                amountError.innerHTML = "Only Numbers";
                amountError.style.color = "red";
            } else if (inputValue == "") {
                amount.style.border = "2px solid red";
                amountError.innerHTML = "Empty";
                amountError.style.color = "red";
            } else {
                amount.style.border = "2px solid green";
                amountError.innerHTML = "";
            }
        });

        // Remaining
        remaining.addEventListener("keyup", function() {
            const inputValue = remaining.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                remaining.style.border = "5px solid red";
                remainingError.innerHTML = "Only Numbers";
                remainingError.style.color = "red";
            } else if (inputValue === "") {
                remaining.style.border = "2px solid red";
                remainingError.innerHTML = "Empty";
                remainingError.style.color = "red";
            } else {
                remaining.style.border = "5px solid green";
                remainingError.innerHTML = "";
            }
        });

        // Remaining date
        paymentDate.addEventListener("input", function() {
            const inputValue = paymentDate.value;

            // Check if date or not
            if (isValidDate(inputValue)) {
                paymentDate.style.border = "5px solid green";
                paymentDateError.innerHTML = "";
            } else {
                paymentDate.style.border = "5px solid red";
                paymentDateError.innerHTML = "This is not date";
                paymentDateError.style.color = "red";
            }
        });

        // Paid date
        Paid.addEventListener("input", function() {
            const inputValue = Paid.value;

            // Check if date or not
            if (isValidDate(inputValue)) {
                Paid.style.border = "2px solid green";
                PaidError.innerHTML = "";
            } else {
                Paid.style.border = "2px solid red";
                PaidError.innerHTML = "This is not date";
                PaidError.style.color = "red";
            }
        });

        // Start date
        StartDate.addEventListener("input", function() {
            const inputValue = StartDate.value;

            // Check if date or not
            if (isValidDate(inputValue)) {
                StartDate.style.border = "2px solid green";
                StartDateError.innerHTML = "";
            } else {
                StartDate.style.border = "2px solid red";
                StartDateError.innerHTML = "This is not date";
                StartDateError.style.color = "red";
            }
        });

        // For paid and start date
        function isValidDate(dateString) {
            let date = new Date(dateString);
            return !isNaN(date.getTime());
        }

        // Level
        level.addEventListener("keyup", function() {
            const inputValue = level.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                level.style.border = "2px solid red";
                levelError.innerHTML = "Only Numbers";
                levelError.style.color = "red";
            } else if (inputValue === "") {
                level.style.border = "2px solid red";
                levelError.innerHTML = "Empty";
                levelError.style.color = "red";
            } else if (inputValue > 14) {
                level.style.border = "2px solid red";
                levelError.innerHTML = "It's more than 14 days";
                levelError.style.color = "red";
            } else {
                level.style.border = "2px solid green";
                levelError.innerHTML = "";
            }
        });

        // Image
        image.addEventListener("change", function() {
            var file = event.target.files[0];

            // Check if image is jpg,jpeg or png
            if (file) {
                var fileName = file.name.toLowerCase();
                if (/\.(jpg|jpeg|png)$/.test(fileName)) {
                    image.style.border = "2px solid green";
                    imageError.innerHTML = "";
                } else {
                    image.style.border = "2px solid red";
                    imageError.innerHTML = "The image must be a JPEG, JPG, or PNG.";
                    imageError.style.color = "red";
                }
            }
        });

        // Button
        for (let j = 0; j < all.length; j++) {
            all[j].addEventListener("keyup", function() {
                for (let i = 0; i < all.length; i++) {
                    if (all[i].style.border === "2px solid red") {
                        button.style.display = "none";
                        buttonError.innerHTML = "Something is wrong";
                        buttonError.style.color = "red";
                        break;
                    } else {
                        buttonError.innerHTML = "";
                        button.style.display = "block";
                    }
                }
            });
        }
    </script>
@endsection
