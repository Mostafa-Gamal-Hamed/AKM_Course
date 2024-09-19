@extends('user.layout')

@section('Title')
{{__('messages.Tutor type')}}
@endsection

<style>
    .language{
        height: 300px !important;
        width: 300px !important;
    }
    .language img {
        height: 200px !important;
        width: 240px !important;
    }
</style>

@section('Body')
    {{-- Header --}}
    <h1 class="text-center fw-bold text-primary mt-5">{{__('messages.Tutor type')}}</h1>
    <div id="fh5co-pricing">
        <div class="container">
            <div class="row gap-3 p-3 flexColumn justify-content-around align-items-center">
                {{-- Tutors --}}
                <a href="{{ url('pricingDetails') }}"
                    class="language col-3 nav-link shadow bg-light border p-3 text-center rounded mb-4 column showPricing">
                    {{-- Image --}}
                    <img src="{{ asset('images/englishTutor.jpeg') }}" class="img-fluid rounded" alt="English">
                    {{-- Name --}}
                    <h4 class="fw-bold mt-3">{{__('messages.English tutors')}}</h4>
                </a>
                {{-- Native tutors --}}
                <a href="{{ url('nativeTutor') }}"
                    class="language col-3 nav-link shadow bg-light border p-3 text-center rounded mb-4 column showPricing">
                    {{-- Image --}}
                    <img src="{{ asset('images/nativeTutor.jpeg') }}" class="img-fluid rounded" alt="English">
                    {{-- Name --}}
                    <h4 class="fw-bold mt-3">{{__('messages.Native english tutors')}}</h4>
                </a>
            </div>
        </div>
    </div>
@endsection
