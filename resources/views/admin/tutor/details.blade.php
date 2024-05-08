@extends('admin.layout')

@section('Title')
    {{ $tutor->name }} Details
@endsection

@section('Body')
    <h3 class="text-dark text-center font-weight-bold mb-5">{{ $tutor->name }}</h3>
    <div class="container mb-5">
        <div class="tutorDetails d-flex">
            {{-- Image & Resume --}}
            <div class="w-100 mx-2">
                <div class="shadow p-3 mb-3">
                    <div class="text-center">
                        <img src=" {{ asset("storage/$tutor->image") }} " class="img-fluid rounded" width="300px"
                            alt="Tutor">
                    </div>
                    <hr>
                    <div>
                        <p>Levels: {{ $tutor->levels }}</p>
                        <p>sessions: {{ $tutor->sessions }}</p>
                        <p>absence sessions: {{ $tutor->absence }}</p>
                    </div>
                </div>
                <div class="shadow p-3">
                    <iframe src="{{ asset('storage/resumes/fMqPLeuNH2OrbylyrwGMuVLPCjMIZeFsrpYnwTu5.pdf') }}" width="100%"
                        height="300px"></iframe>
                </div>
            </div>
            {{-- Edit --}}
            <div class="w-100 mx-2">
                <div class="shadow p-3">
                    <form action="{{ route('tutorUpdate', "$tutor->id") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $tutor->name }}" class="form-control"
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
                            <input type="email" name="email" value="{{ $tutor->email }}" class="form-control"
                                id="email" placeholder="Email" required>
                            {{-- Errors Messages start --}}
                            <span id="emailError"></span>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Number --}}
                        <label>Phone</label>
                        <div class="row mb-3">
                            {{-- Country code --}}
                            <div class="col-5">
                                <select name="countryCode" class="custom-select" id="CountryCode">
                                    <option value="{{ $tutor->country_codes_id }}">{{ $tutor->countryCode->iso }}
                                        +{{ $tutor->countryCode->phonecode }}</option>
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
                                <input type="number" name="phone" value="{{ $tutor->phone }}" class="form-control"
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
                                <option value="{{ $tutor->gender }}" hidden>{{ $tutor->gender }}</option>
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
                            <input type="text" name="country" value="{{ $tutor->country }}" class="form-control"
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
                            <input type="text" name="city" value="{{ $tutor->city }}" class="form-control"
                                id="city" placeholder="City" required>
                            {{-- Errors Messages start --}}
                            <span id="cityError"></span>
                            @error('city')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Address --}}
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ $tutor->address }}" class="form-control"
                                id="address" placeholder="Address" required>
                            {{-- Errors Messages start --}}
                            <span id="addressError"></span>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Levels --}}
                        <div class="mb-3">
                            <label for="levels">Levels</label>
                            <input type="text" name="levels" value="{{ $tutor->levels }}" class="form-control"
                                id="levels" placeholder="levels" required>
                            {{-- Errors Messages start --}}
                            <span id="levelsError"></span>
                            @error('levels')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Sessions --}}
                        <div class="mb-3">
                            <label for="sessions">Sessions</label>
                            <input type="number" name="sessions" value="{{ $tutor->sessions }}" class="form-control"
                                id="sessions" placeholder="Sessions" required>
                            {{-- Errors Messages start --}}
                            <span id="sessionsError"></span>
                            @error('sessions')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Absence sessions --}}
                        <div class="mb-3">
                            <label for="absence">Absence sessions</label>
                            <input type="number" name="absence" value="{{ $tutor->absence }}" class="form-control"
                                id="absence" placeholder="Absence sessions" required>
                            {{-- Errors Messages start --}}
                            <span id="absenceError"></span>
                            @error('absence')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Start date --}}
                        <div class="mb-3">
                            <label for="StartDate">Start Date</label>
                            <input type="date" name="startDate" value="{{ $tutor->startDate }}" class="form-control"
                                id="StartDate" placeholder="Start Date" required>
                            {{-- Errors Messages start --}}
                            <span id="StartDateError"></span>
                            @error('startDate')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- Errors Messages end --}}
                        </div>
                        {{-- Image --}}
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    accept="png,jpg,jpeg">
                                {{-- Errors Messages start --}}
                                <span id="imageError"></span>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                {{-- Errors Messages end --}}
                            </div>
                            <div class="text-center" style="max-height: 150px; max-width: 150px;">
                                <img src="" id="imagePreview" class="rounded"
                                    style="width: 150px; height: 150px; object-fit: cover;" alt="Empty Image">
                            </div>
                            <div>
                                <span id="buttonError"></span><br>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block mt-3" id="button">Update</button>
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

        var address = document.getElementById("address");
        var addressError = document.getElementById("addressError");

        var levels = document.getElementById("levels");
        var levelsError = document.getElementById("levelsError");

        var sessions = document.getElementById("sessions");
        var sessionsError = document.getElementById("sessionsError");

        var absence = document.getElementById("absence");
        var absenceError = document.getElementById("absenceError");

        var StartDate = document.getElementById("StartDate");
        var StartDateError = document.getElementById("StartDateError");

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

        // Address
        address.addEventListener("keyup", function() {
            const inputValue = address.value;

            // Check if empty
            if (inputValue === "") {
                address.style.border = "2px solid red";
                addressError.innerHTML = "Empty";
                addressError.style.color = "red";
            } else {
                address.style.border = "2px solid green";
                addressError.innerHTML = "";
            }
        });

        // Levels
        levels.addEventListener("keyup", function() {
            const inputValue = levels.value;

            // Check if not a number
            if (!/^[0-9,]*$/.test(inputValue)) {
                levels.style.border = "2px solid red";
                levelsError.innerHTML = "Only Numbers and Commas are allowed";
                levelsError.style.color = "red";
            } else if (inputValue === "") {
                levels.style.border = "2px solid red";
                levelsError.innerHTML = "Empty";
                levelsError.style.color = "red";
            } else {
                levels.style.border = "2px solid green";
                levelsError.innerHTML = "";
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

        // Absence sessions
        absence.addEventListener("keyup", function() {
            const inputValue = absence.value;

            // Check if not a number
            if (isNaN(inputValue)) {
                absence.style.border = "2px solid red";
                absenceError.innerHTML = "Only Numbers";
                absenceError.style.color = "red";
            } else if (inputValue === "") {
                absence.style.border = "2px solid red";
                absenceError.innerHTML = "Empty";
                absenceError.style.color = "red";
            } else {
                absence.style.border = "2px solid green";
                absenceError.innerHTML = "";
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
        function isValidDate(dateString) {
            let date = new Date(dateString);
            return !isNaN(date.getTime());
        }

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
