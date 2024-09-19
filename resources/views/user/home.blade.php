@extends('user.layout')

@section('Title')
    AKM Courses
@endsection

@section('Body')
    {{-- Demo class --}}
    <div class="demo">
        <div class="demo_class" id="demo_class">
            <a href="{{ url('tryForFree') }}" class="nav-link popup-vimeo btn-video"
                id="demo_a">{{ __('messages.! Try Free Class') }}</a>
        </div>
    </div>

    {{-- Header --}}
    <header id="fh5co-header" class="fh5co-cover mb-5" role="banner" data-stellar-background-ratio="0.5">
        <img src="{{ asset('images/header.jpg') }}" height="100%" width="100%" alt="Blog">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>{{ __('messages.The Art of Teaching is the Art of Assisting Discovery') }}</h1>
                            <p>
                                <a class="btn btn-primary btn-lg btn-learn"
                                    href="{{ url('contact') }}">{{ __('messages.Take A Course') }}</a>
                                <a class="btn btn-primary btn-lg" href="{{ url('becomeTutor') }}">
                                    {{ __('messages.Become a Tutor') }}
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
                    <span class="fh5co-counter-label fw-bolder">{{ __('messages.Students') }}</span>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="730" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label fw-bolder">{{ __('messages.Courses') }}</span>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="23" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label fw-bolder">{{ __('messages.Tutors') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Course --}}
    <div id="fh5co-explore" class="fh5co-bg-section shadow bg-light mt-5 mb-5">
        <div class="container">
            <div class="row animate-box mb-5">
                <div class="w-75 m-auto text-center fh5co-heading">
                    <h2>{{ __('messages.Take A Course') }}</h2>
                    <p>{{ __('messages.Far away, beyond the mountains, in the North Pole, we will teach you.') }} </p>
                </div>
            </div>
        </div>
        <div class="fh5co-explore fh5co-explore1">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 col-md-push-5 animate-box">
                        <img class="img-responsive border rounded-1 w-75" src="{{ asset('images/take-course.jpg') }}"
                            alt="work">
                    </div>
                    <div class="col-md-4 col-md-pull-8 animate-box">
                        <div class="mt">
                            <h3>{{ __('messages.We Want You To Learn English') }}</h3>
                            <p>{{ __('messages.English is spoken at a useful level by some 1.75 billion people worldwide – that’s one in every four!.') }}
                            </p>
                            <ul class="list-nav">
                                <li><i class="icon-check2"></i>{{ __('messages.Studying English can help you get a job') }}
                                </li>
                                <li><i
                                        class="icon-check2"></i>{{ __('messages.With English, you can study all over the world') }}
                                </li>
                                <li><i
                                        class="icon-check2"></i>{{ __('messages.English is the language of the media industry') }}
                                </li>
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
                                <h4><i class="icon-user"></i>{{ __('messages.It is the language of the Internet') }}</h4>
                                <p>{{ __('messages.English is also a particularly important language online with the highest percentage of content on the internet written in English. As well as this, some of the world’s largest tech companies are based in English speaking countries.') }}
                                </p>
                            </div>
                            <div>
                                <h4><i
                                        class="icon-video2"></i>{{ __('messages.It will help you to understand other languages.') }}
                                </h4>
                                <p>{{ __('messages.English is one of the easiest languages to learn with its simple alphabet. And once English is mastered you will have developed abilities and practices that you did not have before.') }}
                                </p>
                            </div>
                            <div>
                                <h4><i
                                        class="icon-shield"></i>{{ __('messages.You can learn more than just the language.') }}
                                </h4>
                                <p>{{ __('messages.Good knowledge of English will allow you to access films, music and literature from hundreds of countries around the globe.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @if (session()->get("lang") == "ar")
                        <div class="col-md-8 text-start animate-box">
                            <img class="img-responsive rounded w-75" src="{{ asset('images/solution.jpg') }}" alt="work">
                        </div>
                    @else
                        <div class="col-md-8 text-end animate-box">
                            <img class="img-responsive rounded w-75" src="{{ asset('images/solution.jpg') }}" alt="work">
                        </div>
                    @endif
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
                        <h4>{{ __('messages.We have coolest features of this course') }}</h4>
                        <p>{{ __('messages.We offer personalized packages that cater to your learning needs, ensuring exceptional value for every student.') }}
                        </p>
                    </div>
                    <div class="col-md-4 animate-box">
                        <h4>{{ __('messages.Great teachers that we have') }}</h4>
                        <p>{{ __('messages.Every tutor is thoroughly vetted to ensure only the highest quality tutors are appointed, and their performance is continually monitored.') }}
                        </p>
                    </div>
                    <div class="col-md-4 animate-box">
                        <h4>{{ __('messages.Steps by steps turorial session') }}</h4>
                        <p>{{ __('messages.we start by talking to you to understand your learning needs and what you or your child would like to achieve.') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-12 text-center animate-box">
                    <p><a class="btn btn-primary btn-outline btn-lg btn-learn"
                            href="{{ url('courses') }}">{{ __('messages.Our prices') }}</a></p>
                </div>
            </div>
        </div>
    </div>

    {{-- Testimonial --}}
    <div id="fh5co-testimonial" class="fh5co-bg-section mb-5">
        <div class="container">
            <div class="row animate-box">
                <div class="m-auto text-center fh5co-heading">
                    <h2>{{ __('messages.Testimonials') }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row animate-box">
                        <div class="owl-carousel owl-carousel-fullwidth">
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure class="d-flex justify-content-center">
                                        <img src="{{ asset('images/testimonial_1.jpg') }}" alt="user">
                                    </figure>
                                    <span>{{ __('messages.Mena Ahmed') }}</span>
                                    <blockquote>
                                        <p>&ldquo;{{ __('messages.I have enjoyed every class, especially the ‘breakout room’ discussions and the ‘feedback moment’ from teachers at the end of every class.') }}&rdquo;
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure class="d-flex justify-content-center">
                                        <img src="{{ asset('images/testimonial_3.jpeg') }}" alt="user">
                                    </figure>
                                    <span>{{ __('messages.Tomas joun') }}</span>
                                    <blockquote>
                                        <p>&ldquo;{{ __('messages.I had never taken English classes or any other language online, and I was pleasantly surprised by the course’s pedagogical quality, technical platform, organisation, and effectiveness. It is both a well-structured and enriching course. The classes are delightful and understandable, in a friendly and comfortable environment.') }}&rdquo;
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure class="d-flex justify-content-center">
                                        <img src="{{ asset('images/testimonial_2.jpg') }}" alt="user">
                                    </figure>
                                    <span>{{ __('messages.Adam Jone') }}</span>
                                    <blockquote>
                                        <p>&ldquo;{{ __('messages.My son’s tutor has a passion. His passion is contagious because Sebastian became more interested in his studies and future. Sebastian’s grades have significantly improved. AKM experience has been very user-friendly and outstanding which led me to refer it to Sebastian’s classmates.') }}&rdquo;
                                        </p>
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
                    <h2>{{ __('messages.Lets Get Started') }}</h2>
                    <p>{{ __('messages.Ready to start your learning journey with AKM Language courses?') }}</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="m-auto text-center">
                    <p><a class="btn btn-primary btn-outline btn-lg"
                            href="{{ url('contact') }}">{{ __('messages.Join to A New Course') }}</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
