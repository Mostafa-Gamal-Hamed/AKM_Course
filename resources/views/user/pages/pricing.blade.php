@extends('user.layout')

@section('Title')
    AKM {{ __('messages.Pricing') }}
@endsection

<style>
    .header {
        margin-top: 100px;
        font-weight: bold;
    }
    .buyNow{
        transition: 0.5s ease-in-out;
    }
    .buyNow:hover{
        font-size: 19px;
    }
</style>

@section('Body')
    {{-- Header --}}
    <h1 class="header text-center">{{ __('messages.Plans and Pricing') }}</h1>

    {{-- Pricing --}}
    <div id="fh5co-pricing">
        <div class="container">
            <div class="owlPricing pricing p-2 bg-light">
                @foreach ($plans as $plan)
                    <div class="owl-item animate-box">
                        <div class="price-box shadow" style="min-height: 450px;">
                            {{-- Name & Comment --}}
                            <h2 class="pricing-plan fw-bolder text-primary">
                                {{ __("messages.$plan->name") }}
                                @if ($plan->comment != null)
                                    <span class="fw-bolder text-danger">{{ __("messages.$plan->comment") }}</span>
                                @endif
                            </h2>
                            {{-- Price & OfferPrice --}}
                            @if ($plan->offerPrice != null)
                                <p><del>$ {{ $plan->price }}</del></p>
                                <div class="price">
                                    <sup class="currency">$</sup>{{ $plan->offerPrice }}
                                </div>
                            @else
                                <div class="price">
                                    <sup class="currency">$</sup>{{ $plan->price }}
                                </div>
                            @endif
                            {{-- Month --}}
                            <div class="m-2">
                                <small>{{ $plan->month }}/{{ __('messages.month') }}</small>
                            </div>
                            {{-- Type & Sessions --}}
                            <ul class="classes">
                                <li class="text-light bg-secondary mb-2 rounded">{{ __("messages.$plan->type") }}</li>
                                <li class="text-light bg-warning rounded">{{ $plan->sessions }} {{__("messages.sessions")}}</li>
                            </ul>

                            <a href="{{ url("checkout/$plan->id") }}" class="buyNow btn btn-select-plan btn-sm">{{__("messages.Buy now")}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    @if (session()->get('lang') == 'ar')
        <script>
            // Owl
            $(document).ready(function() {
                $(".owlPricing").owlCarousel({
                    loop: true,
                    dots: true,
                    rtl: true,
                    autoplay: true,
                    autoplayTimeout : 3000,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        500: {
                            items: 2,
                        },
                        800: {
                            items: 3,
                        }
                    }
                });
            });
        </script>
    @else
        <script>
            // Owl
            $(document).ready(function() {
                $(".owlPricing").owlCarousel({
                    loop: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout : 3000,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        500: {
                            items: 2,
                        },
                        800: {
                            items: 3,
                        }
                    }
                });
            });
        </script>
    @endif
@endsection
