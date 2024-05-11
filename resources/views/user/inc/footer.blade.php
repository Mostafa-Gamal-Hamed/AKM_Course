{{-- Footer --}}
<footer id="fh5co-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-3 fh5co-widget mb-5">
                <h4>About Learning</h4>
                <p>Best online courses inside and outside egypt with the best teachers,
                    We Help You Gain Confidence And Improve Your Speaking, Pronunciation And Vocabulary.</p>
            </div>
            <div class="col-md-2 text-center mb-5">
                <h4>Learning</h4>
                <ul class="fh5co-footer-links">
                    <li><a href="{{ url('courses') }}">Course</a></li>
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-2 mb-3">
                <h4 class="text-center">Learn &amp; Grow</h4>
                <ul class="fh5co-footer-links">
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#fh5co-testimonial">Testimonials</a></li>
                </ul>
            </div>

            <div class="col-md-5 text-center">
                <img src="{{ asset('images/Logo.jpg') }}" class="img-fluid" width="300px" alt="AKM Courses">
            </div>

        </div>

        <div class="row copyright border-top align-items-center pt-3">
            <div class="col-md-8">
                <span class="mt-3">Copyright 2024 - All rights reserved.</span>
                {{-- <span class="col pe-1"><a href="">Terms Of Use Student</a></span>
                <span class="col border-start ps-1"><a href="">Terms Of Use Tutor</a></span> --}}
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-end text-center">
                    <span class="col-8">Mobile:+02 01010104604</span>
                    <ul class="fh5co-social-icons col-4">
                        <li><a target="_blank"
                                href="https://www.facebook.com/profile.php?id=61554642702631&mibextid=ZbWKwL"
                                class="nav-link"><i class="icon-facebook"></i></a></li>
                    </ul>
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
</body>

</html>
