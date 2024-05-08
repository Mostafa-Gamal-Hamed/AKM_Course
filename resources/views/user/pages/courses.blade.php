@extends('user.layout')

@section('Title')
AKM Our Courses
@endsection

<style>
    /* Header */
    header{
        height: 500px !important;
    }

    /* Servec */
    .service div{
        width: 30.6%;
    }
    .service div:hover{
        color: white;
        background-color: #4e4ffa;
        transition: 0.5s ease-in-out;
    }
    .service div:hover > h5{
        color: white;
    }
    .service div:hover > p:before{
        background-color: white;
    }
    .service div p{
        position: relative;
    }
    .service div p::before{
        position: absolute;
        content: "";
        width: 20px;
        height: 3px;
        background: #3030ea;
        bottom: -10px;
        left: 50%;
        margin-left: -10px;
    }

    /* Hr */
    hr{
        width: 60px;
        margin-bottom: 10px;
        padding: 2px;
        background-color: white !important;
    }

    /* Why english */
    .learn{
        width: 70%;
        margin: auto;
        position: relative;
        background-color: #e8f6f7;
        padding-left: 10px;
        border-left: 2px solid #0099a8;
        border-right: 2px solid #0099a8;
        text-align: center;
    }
    .learn .head, .head2, .head3{
        cursor: pointer;
    }
    .learn .desc, .desc2, .desc3{
        display: none;
        transition: .5s ease-in-out;
    }
</style>

@section('Body')
    {{-- Header --}}
    <header>
        <img src="{{asset('images/header2.jpg')}}" height="100%" width="100%"  alt="Courses">
    </header>

    {{-- Service --}}
    <div id="fh5co-explore" class="fh5co-bg-section mt-5 mb-5">
        <div class="container bg-light shadow">
            <div class="service flexColumn d-flex justify-content-between align-items-center">
                <div class="column border grid gap-1 text-center p-2 mb-4">
                    <img src="{{asset('images/service1.png')}}" class="img-fluid mb-3" height="125px" width="250px" alt="">
                    <h5>Stand Out In Your Field</h5>
                    <p>Use the knowledge and skills you have gained to drive impact at work and grow your career.</p>
                </div>
                <div class="column border grid gap-1 text-center p-2 mb-4">
                    <img src="{{asset('images/service2.jpeg')}}" class="img-fluid mb-3" height="125px" width="250px" alt="">
                    <h5>Learn At Your Own Pace</h5>
                    <p>On your computer, tablet or phone, online courses make learning flexible to fit your busy life.</p>
                </div>
                <div class="column border grid gap-1 text-center p-2 mb-4">
                    <img src="{{asset('images/service3.png')}}" class="img-fluid mb-3" height="125px" width="250px" alt="">
                    <h5>Target Your Goals With An Online Course</h5>
                    <p>Study in your own time and at your own pace. Create the perfect course you need to achieve your goals.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Our expert language --}}
    <div id="fh5co-explore" class="fh5co-bg-section shadow-lg" style="background-color: #03144f;">
        <div class="container">
            <div class="text-center text-light">
                <h4 class="fw-bold text-light">Our expert language tutors will help you improve and become more confident in English.</h4>
                <hr class="m-auto">
                <p class="w-50 m-auto">Learn ESL, get better at your job, or get help with your studies and exams. Our tutors cover reading, writing, grammar, vocabulary, and much more.</p>
            </div>
        </div>
    </div>

    {{-- Why english --}}
    <div class="english shadow bg-light m-5 p-2">
        <h4 class="text-center m-auto p-3"><span class="text-danger">English</span> <span class="fw-bold">FAQ</span></h4>
        <div class="container text-center">
            <div class="learn">
                <h5 class="head">Why learn english?</h5>
                <p class="desc">
                    One of the most prominent languages in the world, English is considered to be the language of international communication,
                    the media and the internet. You need well-spoken and well-written English not only to better conduct your business, increase work opportunities but also for socializing and entertainment.
                </p>
            </div>
            <div class="learn">
                <h5 class="head2">Who will be my English tutor?</h5>
                <p class="desc2">
                    We handpick only the elite English tutors for our students. We are adamant about selecting tutors who are native speakers and have academic credentials in the field of teaching English as a second language;
                    it is also worth mentioning that experience is a cornerstone in the recruitment process of all our tutors.
                </p>
            </div>
            <div class="learn">
                <h5 class="head3">How can AKM English tutor help my child?</h5>
                <p class="desc3">
                    Our tutoring program and great roster of qualified and friendly tutors mean that each lesson is tailored to the needs and goals of your child. Our tutors create the best conditions for learning,
                    developing language and understanding. Courses are fully engaging, usually conversation based while teaching grammar, vocabulary and pronunciation skills through a preset context. This approach encourages students to practice speaking English independently as well as gain self-confidence and the skills they need.
                </p>
            </div>
        </div>
    </div>

    {{-- With you --}}
    <div id="fh5co-explore" class="fh5co-bg-section shadow-lg" style="background-color: #03144f;">
        <div class="container">
            <div class="text-center text-light">
                <h4 class="fw-bold text-light">We are with you step by step until you become a fluently in english.</h4>
            </div>
        </div>
    </div>

    {{-- What you learn --}}
    <div id="fh5co-explore" class="fh5co-bg-section mt-5 mb-5">
        <div class="owl-carousel shadow bg-light">
            <div class="owl-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12">
                        <div class="new-cars-img">
                            <img src="{{asset('images/learn1.png')}}" class="w-100" alt="img" />
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="new-cars-txt">
                            <h2><a href="#">COMMUNICATE</a></h2>
                            <p>
                            Develop the practical communication skills and confidence you need to master real-life situations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12">
                        <div class="new-cars-img">
                            <img src="{{asset('images/learn2.png')}}" class="w-100" alt="img" />
                        </div><!--/.new-cars-img-->
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="new-cars-txt">
                            <h2><a href="#">IMPROVE</a></h2>
                            <p>
                            Enjoy online activities to improve your language skills in your own time. Then work in small groups with your expert teacher and classmates in live online classes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12">
                        <div class="new-cars-img">
                            <img src="{{asset('images/learn3.png')}}" class="w-100" alt="img" />
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="new-cars-txt">
                            <h2><a href="#">CUSTOMISE</a></h2>
                            <p>
                            Live online classes are scheduled throughout the day, everyday, so you can choose to study what you want, when you want.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script>
        // Why english
        $(document).ready(function () {
            $(".head").click(function (e) {
                $(".desc").toggle();
                $(".desc2").hide();
                $(".desc3").hide();
            });
            $(".head2").click(function (e) {
                $(".desc2").toggle();
                $(".desc").hide();
                $(".desc3").hide();
            });
            $(".head3").click(function (e) {
                $(".desc3").toggle();
                $(".desc").hide();
                $(".desc2").hide();
            });
        });

        // Owl
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                items:1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout : 3000,
            });
        });
    </script>

@endsection