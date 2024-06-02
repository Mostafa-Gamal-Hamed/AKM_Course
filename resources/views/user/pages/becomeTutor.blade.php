@extends('user.layout')

@section('Title')
    Become Tutor
@endsection

<style>
    /* Body */
    body {
        background-color: white !important;
    }

    /* Header */
    .header {
        margin-top: 100px;
        font-weight: bold;
    }

    .header h3 {
        margin-bottom: 0px;
        font-weight: bold;
    }
</style>

@section('Body')
    {{-- Header --}}
    <div class="header mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/Logo.jpg') }}" class="img-fluid rounded-circle" width="80px" alt="AKM">
            <h3>AKM Language Course</h3>
        </div>
    </div>

    {{-- Form --}}
    <div class="container border mb-5 w-50 m-auto shadow p-4">
        <h4 class="text-center fw-bold">Become A Tutor</h4>
        <form action="{{ route('becomeTutor') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Name --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" minlength="3" required>
                {{-- Errors Messages start --}}
                <span id="nameError"></span>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Email --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                {{-- Errors Messages start --}}
                <span id="emailError"></span>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Phone --}}
            <div class="row justify-content-center align-items-center mb-3">
                {{-- Country code --}}
                <div class="col-4">
                    <label for="countryCode" class="form-label">Country Code</label>
                    <select name="countryCode" id="countryCode" class="form-select" aria-label="Default select example"
                        required>
                        @foreach ($countryCodes as $code)
                            <option value="{{ $code->id }}">{{ $code->iso }} {{ $code->phonecode }}</option>
                        @endforeach
                    </select>
                    {{-- Errors Messages start --}}
                    <span id="countryCodeError"></span>
                    @error('countryCode')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Phone number --}}
                <div class="col-8">
                    <label for="formFileSm" class="form-label">Number</label>
                    <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone') }}"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" minlength="9"
                        maxlength="13" required>
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
                <label for="formFileSm" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender" aria-label="Default select example" required>
                    <option hidden>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                {{-- Errors Messages start --}}
                <span id="genderError"></span>
                @error('gender')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Birth Date --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Birth Date</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                {{-- Errors Messages start --}}
                <span id="dateError"></span>
                @error('date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Country --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Country</label>
                <input type="text" class="form-control" name="country" id="country" value="{{ old('country') }}"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                {{-- Errors Messages start --}}
                <span id="countryError"></span>
                @error('country')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- City --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                {{-- Errors Messages start --}}
                <span id="cityError"></span>
                @error('city')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Address --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                {{-- Errors Messages start --}}
                <span id="addressError"></span>
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Experience --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">How many years of experience?</label>
                <input type="number" class="form-control" name="experience" id="experience"
                    value="{{ old('experience') }}" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" required>
                {{-- Errors Messages start --}}
                <span id="experienceError"></span>
                @error('experience')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Resume --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Your Resume</label>
                <input type="file" name="resume" id="resume" class="form-control" required>
                {{-- Errors Messages start --}}
                <span id="resumeError"></span>
                @error('resume')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            {{-- Video --}}
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Tell us about you and your experience as a tutor in a video
                    less than 2 minutes</label>
                <input type="file" name="video" id="video" class="form-control" accept="video/*" required>
                {{-- Errors Messages start --}}
                <span id="videoError"></span>
                @error('video')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                {{-- Errors Messages end --}}
            </div>
            <button type="submit" class="btn btn-primary" id="button">Submit</button>
            <span id="buttonError"></span>
        </form>
    </div>

    <script>
        // Validation
        const name = document.getElementById('name');
        const nameError = document.getElementById('nameError');

        const email = document.getElementById('email');
        const emailError = document.getElementById('emailError');

        const number = document.getElementById('phone');
        const numberError = document.getElementById('phoneError');

        const gender = document.getElementById('gender');
        const genderError = document.getElementById('genderError');

        const date = document.getElementById('date');
        const dateError = document.getElementById('dateError');

        const country = document.getElementById('country');
        const countryError = document.getElementById('countryError');

        const city = document.getElementById('city');
        const cityError = document.getElementById('cityError');

        const address = document.getElementById('address');
        const addressError = document.getElementById('addressError');

        const experience = document.getElementById('experience');
        const experienceError = document.getElementById('experienceError');

        const resume = document.getElementById('resume');
        const resumeError = document.getElementById('resumeError');

        const videoInput = document.getElementById('video');
        const videoIError = document.getElementById("videoError");

        const button = document.getElementById("button");
        const buttonError = document.getElementById("buttonError");

        // Name
        name.addEventListener("keyup", function() {
            const inputValue = name.value;
            const regex = /\d/;

            // Check if has less than 3 char or has a number
            if (regex.test(inputValue)) {
                name.style.border = "2px solid red";
                nameError.innerHTML = "Only Letters";
                nameError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Name Input";
                buttonError.style.color = "red";
            } else if (inputValue.length < 3) {
                name.style.border = "2px solid red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Name Input";
                buttonError.style.color = "red";
            } else {
                name.style.border = "2px solid green";
                nameError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // Email
        email.addEventListener("keyup", function() {
            const inputValue = email.value;

            // Check if empty or not letters
            if (inputValue == 0) {
                email.style.border = "2px solid red";
                emailError.innerHTML = "Empty";
                emailError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In email Input";
                buttonError.style.color = "red";
            } else {
                email.style.border = "2px solid green";
                emailError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // Phone
        number.addEventListener("keyup", function() {
            const inputValue = number.value;
            if (isNaN(inputValue)) {
                number.style.border = "2px solid red";
                numberError.innerHTML = "Only Numbers";
                numberError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Number Input";
                buttonError.style.color = "red";
            } else if (inputValue.length < 9 || inputValue.length > 13) {
                number.style.border = "2px solid red";
                numberError.innerHTML = "must be between 9 or 13 numbers";
                numberError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Number Input";
                buttonError.style.color = "red";
            } else {
                number.style.border = "2px solid green";
                numberError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // Gender
        gender.addEventListener("change", function() {
            if (gender.value != "male" && gender.value != "female") {
                gender.style.border = "2px solid red";
                genderError.innerHTML = "It must be male or female only";
                genderError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Gender";
                buttonError.style.color = "red";
            } else {
                gender.style.border = "2px solid green";
                genderError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // Country
        country.addEventListener("keyup", function() {
            const inputValue = country.value;
            const regex = /\d/;

            // Check if empty or not letters
            if (inputValue == 0) {
                country.style.border = "2px solid red";
                countryError.innerHTML = "Empty";
                countryError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Country Input";
                buttonError.style.color = "red";
            } else if (regex.test(inputValue)) {
                country.style.border = "2px solid red";
                countryError.innerHTML = "Only Letters";
                countryError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Country Input";
                buttonError.style.color = "red";
            } else {
                country.style.border = "2px solid green";
                countryError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // City
        city.addEventListener("keyup", function() {
            const inputValue = city.value;
            const regex = /\d/;

            // Check if empty or not letters
            if (inputValue == 0) {
                city.style.border = "2px solid red";
                cityError.innerHTML = "Empty";
                cityError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In City Input";
                buttonError.style.color = "red";
            } else if (regex.test(inputValue)) {
                city.style.border = "2px solid red";
                cityError.innerHTML = "Only Letters";
                cityError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In City Input";
                buttonError.style.color = "red";
            } else {
                city.style.border = "2px solid green";
                cityError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // Address
        address.addEventListener("keyup", function() {
            const inputValue = address.value;

            // Check if empty or not letters
            if (inputValue == 0) {
                address.style.border = "2px solid red";
                addressError.innerHTML = "Empty";
                addressError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Address Input";
                buttonError.style.color = "red";
            } else {
                address.style.border = "2px solid green";
                addressError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // Birth date
        date.addEventListener("input", function() {
            const inputValue = date.value;
            if (isValidDate(inputValue)) {
                date.style.border = "2px solid green";
                dateError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            } else {
                dateError.textContent = "Invalid date format";
                date.style.border = "2px solid red";
                dateError.innerHTML = "This is not date";
                dateError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Birth Date";
                buttonError.style.color = "red";
            }
        });

        function isValidDate(dateString) {
            let date = new Date(dateString);
            return !isNaN(date.getTime());
        }

        // experience
        experience.addEventListener("keyup", function() {
            const inputValue = experience.value;
            if (isNaN(inputValue)) {
                experience.style.border = "2px solid red";
                experienceError.innerHTML = "Only Numbers";
                experienceError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Some Thing Wrong In Experience Input";
                buttonError.style.color = "red";
            } else {
                experience.style.border = "2px solid green";
                experienceError.innerHTML = "";
                button.style.display = "block";
                buttonError.innerHTML = "";
            }
        });

        // Resume
        resume.addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var fileName = file.name.toLowerCase();
                if (
                    file.type === 'application/pdf' ||
                    fileName.endsWith('.pdf')
                ) {
                    resume.style.border = "2px solid green";
                    resumeError.innerHTML = "";
                    button.style.display = "block";
                    buttonError.innerHTML = "";
                } else if (
                    fileName.endsWith('.doc') ||
                    fileName.endsWith('.docx') ||
                    fileName.endsWith('.xlsx') ||
                    file.type === 'application/msword' ||
                    file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ) {
                    resume.style.border = "2px solid green";
                    resumeError.innerHTML = "";
                    button.style.display = "block";
                    buttonError.innerHTML = "";
                } else {
                    resume.style.border = "2px solid red";
                    resumeError.innerHTML = "The selected file is not a PDF or Word File.";
                    resumeError.style.color = "red";
                    button.style.display = "none";
                    buttonError.innerHTML = "Some Thing Wrong In Resume Input";
                    buttonError.style.color = "red";
                }
            }
        });

        // Video
        videoInput.addEventListener('change', function() {
            const videoFile = this.files[0];
            const video = document.createElement('video');
            const reader = new FileReader();

            reader.onload = function(e) {
                video.src = e.target.result;
                video.addEventListener('loadedmetadata', function() {
                    if (video.duration > 120) {
                        videoInput.style.border = "2px solid red";
                        videoIError.style.color = "red";
                        videoIError.innerHTML = 'The video must be less than 2 minutes.';
                        button.style.display = "none";
                        buttonError.innerHTML = "Some Thing Wrong In Video Input";
                        buttonError.style.color = "red";
                    }else{
                        videoInput.style.border = "2px solid green";
                        videoIError.innerHTML = '';
                        button.style.display = "block";
                        buttonError.innerHTML = "";
                    }
                });
            };

            reader.readAsDataURL(videoFile);
        });
    </script>
@endsection
