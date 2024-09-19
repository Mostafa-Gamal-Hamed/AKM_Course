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
            <img src="{{ asset('images/akmi.jpeg') }}" class="img-fluid rounded-circle" width="80px" alt="AKM">
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
                <input type="file" name="resume" id="resume" class="form-control" accept=".pdf" required>
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
            <button type="submit" class="btn btn-success" id="button">Submit</button>
            <span id="buttonError"></span>
        </form>
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
            const $button = $("#button");
            const $buttonError = $("#buttonError");

            function handleValidation($input, $error, isValid, errorMsg) {
                if (isValid) {
                    $input.css("border", "2px solid green");
                    $error.html("");
                    $button.show();
                    $buttonError.html("");
                } else {
                    $input.css("border", "2px solid red");
                    $error.html(errorMsg).css("color", "red");
                    $button.hide();
                    $buttonError.html("Some Thing Wrong In Input").css("color", "red");
                }
            }

            // Validate Name
            $("#name").on("keyup", function() {
                const inputValue = $(this).val();
                const hasNumber = /\d/.test(inputValue);
                handleValidation($(this), $("#nameError"), inputValue.length >= 3 && !hasNumber,
                    "Only Letters and at least 3 characters");
            });

            // Validate Email
            $("#email").on("keyup", function() {
                const inputValue = $(this).val();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const isValidEmail = emailPattern.test(inputValue);

                if (inputValue === "") {
                    handleValidation($(this), $("#emailError"), false, "Email cannot be empty");
                } else if (!isValidEmail) {
                    handleValidation($(this), $("#emailError"), false, "Invalid email format");
                } else {
                    handleValidation($(this), $("#emailError"), true, "");
                }
            });

            // Validate Phone
            $("#phone").on("keyup", function() {
                const inputValue = $(this).val();
                const isValid = !isNaN(inputValue) && inputValue.length >= 9 && inputValue.length <= 13;
                handleValidation($(this), $("#phoneError"), isValid,
                    "Must be between 9 and 13 digits and only numbers");
            });

            // Validate Gender
            $("#gender").on("change", function() {
                const inputValue = $(this).val();
                handleValidation($(this), $("#genderError"), inputValue === "male" || inputValue ===
                    "female", "Must be male or female");
            });

            // Validate Country and City
            function validateText($input, $error) {
                const inputValue = $input.val();
                const hasNumber = /\d/.test(inputValue);
                handleValidation($input, $error, inputValue !== "" && !hasNumber,
                    "Only Letters and cannot be empty");
            }

            $("#country, #city").on("keyup", function() {
                validateText($(this), $("#" + $(this).attr('id') + "Error"));
            });

            // Validate Address
            $("#address").on("keyup", function() {
                const inputValue = $(this).val();
                handleValidation($(this), $("#addressError"), inputValue !== "", "Address cannot be empty");
            });

            // Validate Date
            $("#date").on("input", function() {
                const inputValue = $(this).val();
                const isValidDate = !isNaN(new Date(inputValue).getTime());
                handleValidation($(this), $("#dateError"), isValidDate, "This is not a valid date");
            });

            // Validate Experience
            $("#experience").on("keyup", function() {
                const inputValue = $(this).val();
                handleValidation($(this), $("#experienceError"), !isNaN(inputValue), "Only Numbers");
            });

            // Validate Resume (PDF or Word file)
            $("#resume").on("change", function() {
                const file = this.files[0];
                if (file) {
                    const fileName = file.name.toLowerCase();
                    const isValidFile = file.type === 'application/pdf' || fileName.endsWith('.pdf') ||
                        fileName.endsWith('.doc') || fileName.endsWith('.docx');
                    handleValidation($(this), $("#resumeError"), isValidFile,
                        "Only PDF or Word Files are allowed");
                }
            });

            // Validate Video (less than 2 minutes)
            $("#video").on("change", function() {
                const videoFile = this.files[0];
                if (videoFile) {
                    const video = document.createElement('video');
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        video.src = e.target.result;
                        video.addEventListener('loadedmetadata', function() {
                            handleValidation($("#video"), $("#videoError"), video.duration <=
                                120, "The video must be less than 2 minutes.");
                        });
                    };
                    reader.readAsDataURL(videoFile);
                }
            });
        });
    </script>
@endsection
