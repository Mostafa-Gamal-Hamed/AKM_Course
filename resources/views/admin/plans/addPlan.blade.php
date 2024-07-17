@extends('admin.layout')

@section('Title')
    Add Plan and Price
@endsection

@section('Body')
    <h3 class="text-dark text-center font-weight-bold mb-5">Add Plan and Price</h3>
    <div class="container mb-5">
        <div class="shadow p-3">
            <form action="{{ route('storePlan') }}" method="post">
                @csrf
                {{-- Name --}}
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                        minlength="3" required>
                    {{-- Errors Messages start --}}
                    <span id="nameError"></span>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Comment --}}
                <div class="mb-3">
                    <label for="comment">Comment</label>
                    <input type="text" name="comment" value="{{ old('comment') }}" class="form-control" id="comment">
                    {{-- Errors Messages start --}}
                    <span id="commentError"></span>
                    @error('comment')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Country name --}}
                <div class="mb-3">
                    <label for="countryName">Country name</label>
                    <select name="countryName" class="custom-select" id="countryName">
                        <option hidden>Select country</option>
                        <option value="Egypt">Egypt</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Other">Other</option>
                    </select>
                    {{-- Errors Messages start --}}
                    <span id="countryError"></span>
                    @error('countryName')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Price --}}
                <div class="mb-3">
                    <label for="price">The Price</label>
                    <input type="number" name="price" value="{{ old('price') }}" id="price"
                        class="form-control" required>
                    {{-- Errors Messages start --}}
                    <span id="priceError"></span>
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- OfferPrice --}}
                <div class="mb-3">
                    <label for="offerPrice">Offer Price</label>
                    <input type="number" name="offerPrice" value="{{ old('offerPrice') }}" id="offerPrice"
                        class="form-control">
                    {{-- Errors Messages start --}}
                    <span id="offerPriceError"></span>
                    @error('offerPrice')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Month --}}
                <div class="mb-3">
                    <label for="month">The Month</label>
                    <input type="number" name="month" value="{{ old('month') }}" id="month"
                        class="form-control" required>
                    {{-- Errors Messages start --}}
                    <span id="monthError"></span>
                    @error('month')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Sessions --}}
                <div class="mb-3">
                    <label for="sessions">Sessions</label>
                    <input type="number" name="sessions" value="{{ old('sessions') }}" id="sessions"
                        class="form-control" required>
                    {{-- Errors Messages start --}}
                    <span id="sessionsError"></span>
                    @error('sessions')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>
                {{-- Type --}}
                <div class="mb-3">
                    <label for="type">Type</label>
                    <select name="type" class="custom-select" id="type">
                        <option hidden>Select type</option>
                        <option value="online session">online session</option>
                        <option value="offline session">offline session</option>
                    </select>
                    {{-- Errors Messages start --}}
                    <span id="typeError"></span>
                    @error('type')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
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
        var planName  = document.getElementById("name");
        var nameError = document.getElementById("nameError");

        var comment = document.getElementById("comment");
        var commentError = document.getElementById("commentError");

        var country = document.getElementById("countryName");
        var countryError = document.getElementById("countryNameError");

        var price = document.getElementById("price");
        var priceError = document.getElementById("priceError");

        var offerPrice = document.getElementById("offerPrice");
        var offerPriceError = document.getElementById("offerPriceError");

        var month = document.getElementById("month");
        var monthError = document.getElementById("monthError");

        var sessions = document.getElementById("sessions");
        var sessionsError = document.getElementById("sessionsError");

        var type = document.getElementById("type");
        var typeError = document.getElementById("typeError");

        var all = document.getElementsByTagName("input");
        var button = document.getElementById("button");
        var buttonError = document.getElementById("buttonError");

        // Name
        planName.addEventListener("keyup", function() {
            const inputValue = planName.value;
            const regex = /\d/;

            if (inputValue === "") {
                planName.style.border = "2px solid red";
                nameError.innerHTML = "Empty";
                nameError.style.color = "red";
            } else if (regex.test(inputValue)) {
                planName.style.border = "2px solid red";
                nameError.innerHTML = "Only Letters";
                nameError.style.color = "red";
            } else if (inputValue.length < 3) {
                planName.style.border = "2px solid red";
                nameError.innerHTML = "Name must be more than 3 characters";
                nameError.style.color = "red";
            } else {
                planName.style.border = "2px solid green";
                nameError.innerHTML = "";
            }
        });

        // comment
        comment.addEventListener("keyup", function() {
            const inputValue = comment.value;

            comment.style.border = "2px solid green";
            commentError.innerHTML = "";
        });

        // country
        country.addEventListener("change", function() {
            const inputValue = country.value;

            country.style.border = "2px solid green";
            countryError.innerHTML = "";
            buttonError.innerHTML = "";
            button.style.display = "block";
        });

        // price
        price.addEventListener("keyup", function() {
            const inputValue = price.value;

            if (inputValue === "") {
                price.style.border = "2px solid red";
                priceError.innerHTML = "Empty";
                priceError.style.color = "red";
            } else if (isNaN(inputValue)) {
                price.style.border = "2px solid red";
                priceError.innerHTML = "Only Numbers";
                priceError.style.color = "red";
            } else {
                price.style.border = "2px solid green";
                priceError.innerHTML = "";
            }
        });

        // offerPrice
        offerPrice.addEventListener("keyup", function() {
            const inputValue = offerPrice.value;

            if (isNaN(inputValue)) {
                offerPrice.style.border = "2px solid red";
                offerPriceError.innerHTML = "Only Numbers";
                offerPriceError.style.color = "red";
            } else {
                offerPrice.style.border = "2px solid green";
                offerPriceError.innerHTML = "";
            }
        });

        // month
        month.addEventListener("keyup", function() {
            const inputValue = month.value;

            if (inputValue === "") {
                month.style.border = "2px solid red";
                monthError.innerHTML = "Empty";
                monthError.style.color = "red";
            } else if (isNaN(inputValue)) {
                month.style.border = "2px solid red";
                monthError.innerHTML = "Only Numbers";
                monthError.style.color = "red";
            } else {
                month.style.border = "2px solid green";
                monthError.innerHTML = "";
            }
        });

        // sessions
        sessions.addEventListener("keyup", function() {
            const inputValue = sessions.value;

            if (inputValue === "") {
                sessions.style.border = "2px solid red";
                sessionsError.innerHTML = "Empty";
                sessionsError.style.color = "red";
            } else if (isNaN(inputValue)) {
                sessions.style.border = "2px solid red";
                sessionsError.innerHTML = "Only Numbers";
                sessionsError.style.color = "red";
            } else {
                sessions.style.border = "2px solid green";
                sessionsError.innerHTML = "";
            }
        });

        // type
        type.addEventListener("change", function() {
            const inputValue = type.value;

            // Check if not a male or female
            if (inputValue === "") {
                type.style.border = "2px solid red";
                typeError.innerHTML = "Empty";
                typeError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else if (inputValue != "online session" && inputValue != "offline session") {
                type.style.border = "2px solid red";
                typeError.innerHTML = "It must be online or offline session only";
                typeError.style.color = "red";
                button.style.display = "none";
                buttonError.innerHTML = "Something is wrong";
                buttonError.style.color = "red";
            } else {
                type.style.border = "2px solid green";
                typeError.innerHTML = "";
                buttonError.innerHTML = "";
                button.style.display = "block";
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
