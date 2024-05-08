@extends('user.layout')

@section('Title')
    AKM Pricing
@endsection

<style>
    .header{
        margin-top: 100px;
        font-weight: bold;
    }
</style>

@section('Body')
    {{-- Header --}}
    <h1 class="header text-center">Plans and Pricing</h1>

    {{-- Pricing --}}
    <div id="fh5co-pricing">
        <div class="container">
            <div class="owl-carousel pricing p-2 bg-light">
                <div class="owl-item animate-box">
                    <div class="price-box shadow">
                        <h2 class="pricing-plan">Starter <span>Offer</span></h2>
                        <p><del>EGP 850</del></p>
                        <div class="price">
                            <sup class="currency">EGP</sup>700
                            <small>1/month</small>
                        </div>
                        <ul class="classes">
                            <li>Private and Group Classes</li>
                            <li class="color">4 Live in month</li>
                            <li>Offline session</li>
                            <li class="color">Online session</li>
                        </ul>
                        <a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
                    </div>
                </div>

                <div class="owl-item animate-box">
                    <div class="price-box shadow popular">
                        <h2 class="pricing-plan pricing-plan-offer">Basic <span>Best Offer</span></h2>
                        <p><del>EGP 1950</del></p>
                        <div class="price">
                            <sup class="currency">$</sup>1800
                            <small>3/month</small>
                        </div>
                        <ul class="classes">
                            <li>Private and Group Classes</li>
                            <li class="color">12 Live in month</li>
                            <li>Offline session</li>
                            <li class="color">Online session</li>
                        </ul>
                        <a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
                    </div>
                </div>

                <div class="owl-item animate-box">
                    <div class="price-box shadow">
                        <h2 class="pricing-plan">Pro</h2>
                        <p><del>EGP 2900</del></p>
                        <div class="price">
                            <sup class="currency">$</sup>2800
                            <small>6/month</small>
                        </div>
                        <ul class="classes">
                            <li>Private and Group Classes</li>
                            <li class="color">24 Live in month</li>
                            <li>Offline session</li>
                            <li class="color">Online session</li>
                        </ul>
                        <a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
                    </div>
                </div>

                <div class="owl-item animate-box">
                    <div class="price-box shadow popular">
                        <h2 class="pricing-plan pricing-plan-offer">Unlimited <span>Best Offer</span></h2>
                        <p><del>EGP 5800</del></p>
                        <div class="price">
                            <sup class="currency">$</sup>5500
                            <small>12/month</small>
                        </div>
                        <ul class="classes">
                            <li>Private and Group Classes</li>
                            <li class="color">48 Live in month</li>
                            <li>Offline session</li>
                            <li class="color">Online session</li>
                        </ul>
                        <a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Owl
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop: true,
                dots: true,
                // autoplay: true,
                // autoplayTimeout : 2000,
                responsive : {
                    0 : {
                        items : 1,
                    },
                    500 : {
                        items : 2,
                    },
                    800 : {
                        items : 3,
                    }
                }
            });
        });
    </script>
@endsection
