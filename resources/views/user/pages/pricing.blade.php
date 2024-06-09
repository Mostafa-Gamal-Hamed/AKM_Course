@extends('user.layout')

@section('Title')
    AKM {{ __('messages.Pricing') }}
@endsection

<style>
    .language {
        position: relative;
    }

    .language .open {
        position: absolute;
        right: 0px;
        top: 20px;
        transform: rotate(45deg);
        width: 65px;
        border-radius: 5px;
    }

    .language .soon {
        position: absolute;
        right: 0px;
        top: 20px;
        transform: rotate(45deg);
        width: 65px;
        border-radius: 5px;
    }
</style>

@section('Body')
    {{-- Header --}}
    <h1 class="text-center fw-bold text-primary mt-5">{{ __('messages.Languages') }}</h1>

    {{-- Pricing --}}
    <div id="fh5co-pricing">
        <div class="container">
            <div class="mb-5">
                <div class="p-3">
                    <div class="row gap-3 p-3 flexColumn justify-content-between align-items-center">
                        {{-- English --}}
                        <a href="{{ url('pricingDetails') }}"
                            class="language col-3 nav-link shadow bg-light border p-3 text-center rounded mb-4 column showPricing">
                            {{-- Note --}}
                            <div class="bg-success open"><span class="text-light"
                                    id="french">{{ __('messages.Open') }}</span></div>
                            {{-- Image --}}
                            <img src="{{ asset('images/English-Language.jpg') }}" class="img-fluid rounded"
                                style="height: 135px; width: 240px;" alt="English">
                            {{-- Name --}}
                            <h4 class="fw-bold mt-3">{{ __('messages.English Courses') }}</h4>
                        </a>
                        {{-- French --}}
                        <div
                            class="language col-3 nav-link shadow bg-light border p-3 text-center rounded mb-4 column showPricing">
                            {{-- Note --}}
                            <div class="bg-danger soon"><span class="text-light">{{ __('messages.Soon') }}</span></div>
                            {{-- Image --}}
                            <img src="{{ asset('images/french-Language.jpeg') }}" style="height: 135px; width: 240px;"
                                class="img-fluid rounded" alt="French">
                            {{-- Name --}}
                            <h4 class="fw-bold mt-3">{{ __('messages.French Courses') }}</h4>
                        </div>
                        {{-- German --}}
                        <div
                            class="language col-3 nav-link shadow bg-light border p-3 text-center rounded mb-4 column showPricing">
                            {{-- Note --}}
                            <div class="bg-danger soon"><span class="text-light">{{ __('messages.Soon') }}</span></div>
                            {{-- Image --}}
                            <img src="{{ asset('images/German-Language.png') }}" style="height: 135px; width: 240px;"
                                class="img-fluid rounded" alt="German">
                            {{-- Name --}}
                            <h4 class="fw-bold mt-3">{{ __('messages.German Courses') }}</h4>
                        </div>
                        {{-- Italy --}}
                        <div
                            class="language col-3 nav-link shadow bg-light border p-3 text-center rounded mb-4 column showPricing">
                            {{-- Note --}}
                            <div class="bg-danger soon"><span class="text-light">{{ __('messages.Soon') }}</span></div>
                            {{-- Image --}}
                            <img src="{{ asset('images/Italy-Language.jpg') }}" class="img-fluid rounded"
                                style="height: 135px; width: 240px;" alt="Italy">
                            {{-- Name --}}
                            <h4 class="fw-bold mt-3">{{ __('messages.Italy Courses') }}</h4>
                        </div>
                        {{-- Chinese --}}
                        <div
                            class="language col-3 nav-link shadow bg-light border p-3 text-center rounded mb-4 column showPricing">
                            {{-- Note --}}
                            <div class="bg-danger soon"><span class="text-light">{{ __('messages.Soon') }}</span></div>
                            {{-- Image --}}
                            <img src="{{ asset('images/Chinese-Language.jpeg') }}" class="img-fluid rounded"
                                style="height: 135px; width: 240px;" alt="Chinese">
                            {{-- Name --}}
                            <h4 class="fw-bold mt-3">{{ __('messages.Chinese Courses') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
