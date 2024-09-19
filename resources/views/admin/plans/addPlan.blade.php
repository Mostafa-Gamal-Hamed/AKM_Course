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
                    <select name="countryName" class="custom-select" id="countryName" required>
                        <option hidden>Select country</option>
                        <option value="Egypt">Egypt</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Other">Other</option>
                        <option value="">Empty</option>
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
                    <input type="number" name="price" value="{{ old('price') }}" id="price" class="form-control"
                        required>
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
                    <input type="number" name="month" value="{{ old('month') }}" id="month" class="form-control"
                        max="12" required>
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
                    <input type="number" name="sessions" value="{{ old('sessions') }}" id="sessions" class="form-control"
                        max="80" required>
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
                    <select name="type" class="custom-select" id="type" required>
                        <option hidden>Select type</option>
                        <option value="privet">Privet</option>
                        <option value="group">Group</option>
                        <option value="native">Native</option>
                    </select>
                    {{-- Errors Messages start --}}
                    <span id="typeError"></span>
                    @error('type')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- Errors Messages end --}}
                </div>

                <button type="submit" class="btn btn-success btn-block mt-3" id="button">Submit</button>
            </form>
        </div>
    </div>

    {{-- Validation --}}
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                @foreach ($errors->keys() as $error)
                    $("input[name='{{ $error }}']").css("border", "2px solid red");
                    $("select[name='{{ $error }}']").css("border", "2px solid red");
                @endforeach
            @endif
            // Catch elements
            var $planName = $('#name');
            var $nameError = $('#nameError');

            var $comment = $('#comment');
            var $commentError = $('#commentError');

            var $country = $('#countryName');
            var $countryError = $('#countryNameError');

            var $price = $('#price');
            var $priceError = $('#priceError');

            var $offerPrice = $('#offerPrice');
            var $offerPriceError = $('#offerPriceError');

            var $month = $('#month');
            var $monthError = $('#monthError');

            var $sessions = $('#sessions');
            var $sessionsError = $('#sessionsError');

            var $type = $('#type');
            var $typeError = $('#typeError');

            // Name Validation
            $planName.on('keyup', function() {
                var inputValue = $(this).val();
                var regex = /\d/;

                if (inputValue === "") {
                    $planName.css('border', '2px solid red');
                    $nameError.text("Empty").css('color', 'red');
                } else if (regex.test(inputValue)) {
                    $planName.css('border', '2px solid red');
                    $nameError.text("Only Letters").css('color', 'red');
                } else if (inputValue.length < 3) {
                    $planName.css('border', '2px solid red');
                    $nameError.text("Name must be more than 3 characters").css('color', 'red');
                } else {
                    $planName.css('border', '2px solid green');
                    $nameError.text("");
                }
            });

            // Comment Validation (optional)
            $comment.on('keyup', function() {
                $(this).css('border', '2px solid green');
                $commentError.text("");
            });

            // Country Validation
            var allowedCountries = [
                "Egypt",
                "United Arab Emirates",
                "Saudi Arabia",
                "Kuwait",
                "Qatar",
                "Bahrain",
                "Other",
                ""
            ];
            $country.on('change', function() {
                var inputValue = $(this).val();

                if (allowedCountries.includes(inputValue)) {
                    $(this).css('border', '2px solid green');
                    $countryError.text("");
                    $button.show();
                    $buttonError.text("");
                } else {
                    $(this).css('border', '2px solid red');
                    $countryError.text("Invalid country selection").css('color', 'red');
                    $button.hide();
                    $buttonError.text("Please select a valid country").css('color', 'red');
                }
            });

            // Price Validation
            $price.on('keyup', function() {
                var inputValue = $(this).val();

                if (inputValue === "") {
                    $price.css('border', '2px solid red');
                    $priceError.text("Empty").css('color', 'red');
                } else if (isNaN(inputValue)) {
                    $price.css('border', '2px solid red');
                    $priceError.text("Only Numbers").css('color', 'red');
                } else {
                    $price.css('border', '2px solid green');
                    $priceError.text("");
                }
            });

            // Offer Price Validation
            $offerPrice.on('keyup', function() {
                var inputValue = $(this).val();

                if (isNaN(inputValue)) {
                    $offerPrice.css('border', '2px solid red');
                    $offerPriceError.text("Only Numbers").css('color', 'red');
                } else {
                    $offerPrice.css('border', '2px solid green');
                    $offerPriceError.text("");
                }
            });

            // Month Validation
            $month.on('keyup', function() {
                var inputValue = $(this).val();

                if (inputValue === "") {
                    $month.css('border', '2px solid red');
                    $monthError.text("Empty").css('color', 'red');
                } else if (isNaN(inputValue)) {
                    $month.css('border', '2px solid red');
                    $monthError.text("Only Numbers").css('color', 'red');
                } else {
                    $month.css('border', '2px solid green');
                    $monthError.text("");
                }
            });

            // Sessions Validation
            $sessions.on('keyup', function() {
                var inputValue = $(this).val();

                if (inputValue === "") {
                    $sessions.css('border', '2px solid red');
                    $sessionsError.text("Empty").css('color', 'red');
                } else if (isNaN(inputValue)) {
                    $sessions.css('border', '2px solid red');
                    $sessionsError.text("Only Numbers").css('color', 'red');
                } else {
                    $sessions.css('border', '2px solid green');
                    $sessionsError.text("");
                }
            });

            // Type Validation
            $type.on('change', function() {
                var inputValue = $(this).val();

                if (inputValue === "") {
                    $type.css('border', '2px solid red');
                    $typeError.text("Empty").css('color', 'red');
                    $button.hide();
                    $buttonError.text("Something is wrong").css('color', 'red');
                } else {
                    $type.css('border', '2px solid green');
                    $typeError.text("");
                    $button.show();
                    $buttonError.text("");
                }
            });
        });
    </script>
@endsection
