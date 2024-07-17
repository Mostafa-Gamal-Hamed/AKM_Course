@extends('user.layout')

@section('Title')
    AKM {{ __('messages.Contact us for booking') }}
@endsection



@section('Body')
    {{-- Header --}}
    <h1 class="text-center fw-bold text-primary mt-5">{{ __('messages.Contact us for booking') }}</h1>

    <div id="fh5co-pricing">
        <div class="container">
            <div class="text-center shadow bg-light p-4">
                <h3 class="mt-5 mb-5">
                    {{__("messages.To book the course and know the plans and prices, contact us on")}}
                </h3>
                <div class="row mb-5">
                    <div class="col">
                        <h5>{{__("messages.Whats app")}}</h5>
                        <a href="https://wa.me/201066266189">
                            <img src="{{asset('images/whatap.png')}}" width="90px" target="_blank" alt="Whats App">
                        </a>
                    </div>
                    <div class="col">
                        <h5>{{__("messages.Email")}}</h5>
                        <a href="mailto:hr@akmcourse.com" target="_blank">
                            <img src="{{asset('images/Gmail.png')}}" width="90px" alt="Gmail">
                        </a>
                    </div>
                </div>
                <img src="{{asset('images/Logo.jpg')}}" style="border-radius: 20px;" width="100%" height="300px" alt="AKM">
            </div>
        </div>
    </div>
@endsection