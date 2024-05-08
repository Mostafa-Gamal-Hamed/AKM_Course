@extends('user.layout')

@section('Title')
    AKM Courses
@endsection

@section('Body')
    {{-- Header --}}
    <header id="fh5co-header" class="fh5co-cover mb-5" role="banner" data-stellar-background-ratio="0.5">
        <img src="{{asset('images/header.jpg')}}" height="100%" width="100%"  alt="Blog">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>The Art of Teaching is the Art of Assisting Discovery</h1>
                            <p>
                                <a class="btn btn-primary btn-lg btn-learn" href="{{url('contact')}}">Take A Course</a>
                                <a class="btn btn-primary btn-lg popup-vimeo btn-video" href="{{url('ourTutors')}}">
                                    Become a Tutor
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Counter --}}
    <div id="fh5co-counter" class="fh5co-counters shadow bg-light p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="546" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Students</span>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="730" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Courses</span>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="23" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Tutors</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Course --}}
    <div id="fh5co-explore" class="fh5co-bg-section shadow bg-light mt-5 mb-5">
        <div class="container">
            <div class="row animate-box mb-5">
                <div class="w-75 m-auto text-center fh5co-heading">
                    <h2>Take A Course</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. </p>
                </div>
            </div>
        </div>
        <div class="fh5co-explore fh5co-explore1">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 col-md-push-5 animate-box">
                        <img class="img-responsive border rounded-1 w-75" src="{{ asset('images/take-course.jpg') }}" alt="work">
                    </div>
                    <div class="col-md-4 col-md-pull-8 animate-box">
                        <div class="mt">
                            <h3>We Want You To Learn English</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            <ul class="list-nav">
                                <li><i class="icon-check2"></i>Far far away, behind the word</li>
                                <li><i class="icon-check2"></i>There live the blind texts</li>
                                <li><i class="icon-check2"></i>Separated they live in bookmarksgrove</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fh5co-explore">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4 animate-box">
                        <div class="mt">
                            <div>
                                <h4><i class="icon-user"></i>Real Project For Real Solutions</h4>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia. </p>
                            </div>
                            <div>
                                <h4><i class="icon-video2"></i>Real Project For Real Solutions</h4>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. </p>
                            </div>
                            <div>
                                <h4><i class="icon-shield"></i>Real Project For Real Solutions</h4>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 text-end animate-box">
                        <img class="img-responsive rounded w-75" src="{{ asset('images/solution.jpg') }}" alt="work">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Prices --}}
    <div id="fh5co-project mb-5">
        <div class="container">
            <div class="features">
                <div class="row">
                    <div class="col-md-4 animate-box">
                        <h4>We have coolest features of this course</h4>
                        <p>We offer personalized packages that cater to your learning needs, ensuring exceptional value for every student. </p>
                    </div>
                    <div class="col-md-4 animate-box">
                        <h4>Great teachers that we have</h4>
                        <p>Every tutor is thoroughly vetted to ensure only the highest quality tutors are appointed,
                            and their performance is continually monitored. </p>
                    </div>
                    <div class="col-md-4 animate-box">
                        <h4>Steps by steps turorial session</h4>
                        <p>we start by talking to you to understand your learning needs and what you or your child would like to achieve. </p>
                    </div>
                </div>
                <div class="col-md-12 text-center animate-box">
                    <p><a class="btn btn-primary btn-outline btn-lg btn-learn" href="{{url('pricing')}}">Our prices</a></p>
                </div>
            </div>
        </div>
    </div>

    {{-- Testimonial --}}
    <div id="fh5co-testimonial" class="fh5co-bg-section mb-5">
        <div class="container">
            <div class="row animate-box">
                <div class="m-auto text-center fh5co-heading">
                    <h2>Testimonials</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row animate-box">
                        <div class="owl-carousel owl-carousel-fullwidth">
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="{{ asset('images/testimonial_1.jpg') }}" alt="user">
                                    </figure>
                                    <span>Mena Ahmed</span>
                                    <blockquote>
                                        <p>&ldquo;I have enjoyed every class, especially the ‘breakout room’
                                            discussions and the ‘feedback moment’ from teachers at the end of every class.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="{{ asset('images/testimonial_3.jpeg') }}" alt="user">
                                    </figure>
                                    <span>Tomas joun</span>
                                    <blockquote>
                                        <p>&ldquo;I had never taken English classes or any other language online, and I was pleasantly surprised by the course’s pedagogical quality, technical platform,
                                            organisation, and effectiveness. It is both a well-structured and enriching course.
                                            The classes are delightful and understandable, in a friendly and comfortable environment.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="{{ asset('images/testimonial_2.jpg') }}" alt="user">
                                    </figure>
                                    <span>Adam Jone</span>
                                    <blockquote>
                                        <p>&ldquo;My son’s tutor has a passion. His passion is contagious because Sebastian became more interested in his studies and future.
                                            Sebastian’s grades have significantly improved. AKM experience has been very user-friendly and outstanding which led me to refer it to Sebastian’s classmates.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Get Started --}}
    <div id="fh5co-started" class="bg-light mb-5 shadow p-5">
        <div class="container">
            <div class="row animate-box">
                <div class="m-auto text-center fh5co-heading">
                    <h2>Lets Get Started</h2>
                    <p>Ready to start your learning journey with AKM Language courses?</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="m-auto text-center">
                    <p><a class="btn btn-primary btn-outline btn-lg" href="{{url('contact')}}">Join to A New Course</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
