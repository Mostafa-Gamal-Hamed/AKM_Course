@extends('admin.layout')

@section('Title')
    Add Student
@endsection

@section('Body')
    <h3 class="text-dark text-center font-weight-bold mb-5">Add Student</h3>
    <div class="container mb-5">
        <div class="shadow p-3">
            <form action="{{ route('storeStudent') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Name --}}
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                        placeholder="Full Name" minlength="3" required>
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
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email"
                        placeholder="Email" required>
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
                            <option hidden>Select Country Code</option>
                            @foreach ($countryCode as $code)
                                <option value="{{ $code->id }}">{{ $code->iso }} +{{ $code->phonecode }}</option>
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
                        <input type="number" name="phone" value="{{ old('phone') }}" class="form-control" id="phone"
                            placeholder="Number" minlength="9" required>
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
                        <option hidden>Select Gender</option>
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
                    <input type="text" name="country" value="{{ old('country') }}" class="form-control" id="country"
                        placeholder="Country" required>
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
                    <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="city"
                        placeholder="City" required>
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
                        <option hidden>Select Payment</option>
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
                    <input type="number" name="amount" value="{{ old('amount') }}" id="studentAmount"
                        class="form-control" placeholder="The Amount" required>
                    {{-- Errors Messages start --}}
                    <span id="studentAmountError"></span>
                    @error('amount')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- The remaining & Payment date --}}
                <div class="mb-3" id="remainingDiv"
                    style="display: none; padding:10px; color:white; background-color: #4b70dc;">
                    <label for="remaining">The remaining</label>
                    <input type="number" name="remaining" class="form-control"
                        id="remaining" placeholder="The Remaining">
                    {{-- Errors Messages start --}}
                    <span id="remainingError"></span>
                    @error('remaining')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>
                    {{-- Errors Messages end --}}

                    {{-- The Payment date --}}
                    <label for="paymentDate">The date of payment</label>
                    <input type="date" name="paymentDate" class="form-control"
                        id="paymentDate" placeholder="Remaining date">
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
                    <input type="date" name="Paid" value="{{ old('Paid') }}" class="form-control"
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
                    <input type="date" name="startDate" value="{{ old('startDate') }}" class="form-control"
                        id="StartDate" placeholder="Start Date" required>
                    {{-- Errors Messages start --}}
                    <span id="StartDateError"></span>
                    @error('startDate')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- End Date --}}
                <div class="mb-3">
                    <label for="EndDate">End Date</label>
                    <input type="date" name="endDate" value="{{ old('endDate') }}"
                        class="form-control" id="endDate" placeholder="End Date" required>
                    {{-- Errors Messages start --}}
                    <span id="endDateError"></span>
                    @error('endDate')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Level --}}
                <div class="mb-3">
                    <label for="level">Levels</label>
                    <input type="number" name="levels" value="{{ old('levels') }}" class="form-control"
                        id="level" placeholder="Levels" required>
                    {{-- Errors Messages start --}}
                    <span id="levelError"></span>
                    @error('levels')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- User level --}}
                <div class="mb-3">
                    <label for="userLevel">User Level</label>
                    <select name="userLevel" class="custom-select" id="userLevel">
                        <option hidden>Select User Level</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    {{-- Errors Messages start --}}
                    <span id="userLevelError"></span>
                    @error('userLevel')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Sessions --}}
                <div class="mb-3">
                    <label for="sessions">Sessions</label>
                    <input type="number" name="sessions" value="{{ old('sessions') }}" class="form-control"
                        id="sessions" placeholder="Sessions" required>
                    {{-- Errors Messages start --}}
                    <span id="sessionsError"></span>
                    @error('sessions')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Attended --}}
                <div class="mb-3">
                    <label for="Attended">Attended</label>
                    <input type="number" name="Attended" value="{{ old('Attended') }}" class="form-control"
                        id="Attended" placeholder="Attended" required>
                    {{-- Errors Messages start --}}
                    <span id="AttendedError"></span>
                    @error('Attended')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Absented --}}
                <div class="mb-3">
                    <label for="Absented">Absented</label>
                    <input type="number" name="Absented" value="{{ old('Absented') }}" class="form-control"
                        id="Absented" placeholder="Absented" required>
                    {{-- Errors Messages start --}}
                    <span id="AbsentedError"></span>
                    @error('Absented')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Remaining sessions --}}
                <div class="mb-3">
                    <label for="remainingSessions">Remaining sessions</label>
                    <input type="number" name="remainingSessions" value="{{ old('remainingSessions') }}" class="form-control"
                        id="remainingSessions" placeholder="Remaining sessions" required>
                    {{-- Errors Messages start --}}
                    <span id="remainingSessionsError"></span>
                    @error('remainingSessions')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Image --}}
                <div class="mb-3">
                    <div class="mb-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" required>
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

        var endDate = document.getElementById("endDate");
        var endDateError = document.getElementById("endDateError");

        var level = document.getElementById("level");
        var levelError = document.getElementById("levelError");

        var userLevel = document.getElementById("userLevel");
        var userLevelError = document.getElementById("userLevelError");

        var sessions = document.getElementById("sessions");
        var sessionsError = document.getElementById("sessionsError");

        var Attended = document.getElementById("Attended");
        var AttendedError = document.getElementById("AttendedError");

        var Absented = document.getElementById("Absented");
        var AbsentedError = document.getElementById("AbsentedError");

        var remainingSessions = document.getElementById("remainingSessions");
        var remainingSessionsError = document.getElementById("remainingSessionsError");

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

        // End date
        endDate.addEventListener("input", function() {
            const inputValue = endDate.value;

            // Check if date or not
            if (isValidDate(inputValue)) {
                endDate.style.border = "2px solid green";
                endDateError.innerHTML = "";
            } else {
                endDate.style.border = "2px solid red";
                endDateError.innerHTML = "This is not date";
                endDateError.style.color = "red";
            }
        });

        // For paid and start date and end date
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

        // userLevel
        userLevel.addEventListener("change", function() {
            const inputValue = userLevel.value;
            const numbers = [1,2,3,4,5,6,7,8,9,10];

            // Check if not a male or female
            if (inputValue < 1 || inputValue > 10) {
                userLevel.style.border = "2px solid red";
                userLevelError.innerHTML = "It must be between 1 to 10 only";
                userLevelError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else if (inputValue === "") {
                userLevel.style.border = "2px solid red";
                userLevelError.innerHTML = "Empty";
                userLevelError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else {
                userLevel.style.border = "2px solid green";
                userLevelError.innerHTML = "";
                buttonError.innerHTML = "";
                button.style.display = "block";
            }
        });

        // Sessions
        sessions.addEventListener("keyup", function() {
            const inputValue = sessions.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                sessions.style.border = "2px solid red";
                sessionsError.innerHTML = "Only Numbers";
                sessionsError.style.color = "red";
            } else if (inputValue === "") {
                sessions.style.border = "2px solid red";
                sessionsError.innerHTML = "Empty";
                sessionsError.style.color = "red";
            } else {
                sessions.style.border = "2px solid green";
                sessionsError.innerHTML = "";
            }
        });

        // Attended
        Attended.addEventListener("keyup", function() {
            const inputValue = Attended.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                Attended.style.border = "2px solid red";
                AttendedError.innerHTML = "Only Numbers";
                AttendedError.style.color = "red";
            } else if (inputValue === "") {
                Attended.style.border = "2px solid red";
                AttendedError.innerHTML = "Empty";
                AttendedError.style.color = "red";
            } else {
                Attended.style.border = "2px solid green";
                AttendedError.innerHTML = "";
            }
        });

        // Absented
        Absented.addEventListener("keyup", function() {
            const inputValue = Absented.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                Absented.style.border = "2px solid red";
                AbsentedError.innerHTML = "Only Numbers";
                AbsentedError.style.color = "red";
            } else if (inputValue === "") {
                Absented.style.border = "2px solid red";
                AbsentedError.innerHTML = "Empty";
                AbsentedError.style.color = "red";
            } else {
                Absented.style.border = "2px solid green";
                AbsentedError.innerHTML = "";
            }
        });

        // Remaining sessions
        remainingSessions.addEventListener("keyup", function() {
            const inputValue = remainingSessions.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                remainingSessions.style.border = "2px solid red";
                remainingSessionsError.innerHTML = "Only Numbers";
                remainingSessionsError.style.color = "red";
            } else if (inputValue === "") {
                remainingSessions.style.border = "2px solid red";
                remainingSessionsError.innerHTML = "Empty";
                remainingSessionsError.style.color = "red";
            } else {
                remainingSessions.style.border = "2px solid green";
                remainingSessionsError.innerHTML = "";
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
