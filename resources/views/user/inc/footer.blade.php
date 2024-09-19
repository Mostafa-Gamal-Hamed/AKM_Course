{{-- Moving bar --}}
@if (session()->get('lang') == 'ar')
    <style>
        @keyframes moveText {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(100%);
            }
        }
    </style>
@else
    <style>
        @keyframes moveText {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }
    </style>
@endif

<div class="bar">
    <div class="move-bar" id="movingBar">
        <span>
            {{__("messages.Welcome To AKM Language Courses The Best Online Courses Ever We are with you until you reach professionalism")}}
            {{-- {{__("messages.Welcome To AKM Language Courses.")}} <a href="{{ url('pricing') }}" class="text-warning">{{__("messages.Now 50% discount on all courses. Catch the offer now")}}</a> --}}
        </span>
    </div>
</div>


{{-- Footer --}}
<footer id="fh5co-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-3 fh5co-widget mb-5">
                <h4>{{__("messages.About Learning")}}</h4>
                <p>{{__("messages.Best online courses inside and outside egypt with the best teachers, We Help You Gain Confidence And Improve Your Speaking, Pronunciation And Vocabulary.")}}</p>
            </div>
            <div class="col-md-2 text-center mb-5">
                <h4>{{__("messages.Learning")}}</h4>
                <ul class="fh5co-footer-links">
                    <li><a href="{{ url('courses') }}">{{__("messages.Course")}}</a></li>
                    <li><a href="{{ url('blog') }}">{{__("messages.Blog")}}</a></li>
                    <li><a href="{{ url('contact') }}">{{__("messages.Contact us")}}</a></li>
                </ul>
            </div>

            <div class="col-md-2 text-center mb-3">
                <h4>{{__("messages.Learn")}} &amp; {{__("messages.Grow")}}</h4>
                <ul class="fh5co-footer-links">
                    <li><a href="{{ url('blog') }}">{{__("messages.Blog")}}</a></li>
                    <li><a href="#">{{__("messages.Privacy")}}</a></li>
                    <li><a href="#fh5co-testimonial">{{__("messages.Testimonials")}}</a></li>
                </ul>
            </div>

            <div class="col-md-5 text-center">
                <img src="{{ asset('images/Logoo.png') }}" class="img-fluid" width="300px" alt="AKM Courses">
            </div>

        </div>

        <div class="row copyright border-top align-items-center pt-3">
            <div class="col-md-8">
                <span class="mt-3">{{__("messages.Copyright 2024 - All rights reserved.")}}</span>
                {{-- <span class="col pe-1"><a href="">Terms Of Use Student</a></span>
                <span class="col border-start ps-1"><a href="">Terms Of Use Tutor</a></span> --}}
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <a target="_blank"
                        href="https://www.facebook.com/profile.php?id=61554642702631&mibextid=ZbWKwL"
                        class="nav-link"><i class="fa-brands fa-facebook"></i>
                    </a>
                    <a target="_blank"
                        href="https://x.com/AKM_corses?t=BF3y0BPkjGoueijpVRjVxg&s=09"
                        class="nav-link"><i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a target="_blank"
                        href="https://www.tiktok.com/@akmcorses?_t=8nUWQaerglV&_r=1"
                        class="nav-link"><i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a target="_blank"
                        href="https://wa.me/201066266189"
                        class="nav-link"><i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</footer>
</div>

{{-- Go Top --}}
<div class="gototop js-top">
    <a href="#" class="js-gotop nav-link"><i class="icon-arrow-up"></i></a>
</div>


{{-- JS Scripts --}}
<script src="{{ asset('assets/js/magnific-popup-options.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/respond.min.js') }}"></script>
<script src="{{ asset('assets/js/fontawesome.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@if (session()->get("lang") == "ar")
    <script>
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            smartSpeed: 800,
            autoHeight: true,
            rtl: true
        });
    </script>
@endif
</body>

</html>
