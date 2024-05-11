@extends('user.layout')

@section('Title')
    AKM Tutors
@endsection

<style>
    .header{
        margin-top: 100px;
        font-weight: bold;
    }

    /* Hr */
    .first{
        width: 60px;
        margin-bottom: 10px;
        padding: 2px;
        background-color: white !important;
    }

    /* Tutors */
    .tutor{
        width: 150px;
        height: auto;
    }
    .tutor .images{
        position: relative;
    }
    .tutor .images .photo{
        width: 100%;
        height: 150px;
    }
    .tutor .images .star{
        position: absolute;
        bottom: 0;
        right: 0;
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
    <h1 class="header text-center"><span class="text-danger">Meet</span> Our Tutors</h1>

    {{-- Special tutors --}}
    <div id="fh5co-explore" class="fh5co-bg-section mb-5" style="background-color: #03144f;">
        <div class="container">
            <div class="text-center text-light">
                <h4 class="fw-bold text-light">Not just anyone can become an AKM Tutor</h4>
                <hr class="first m-auto">
                <p class="w-50 m-auto">We match our students with the right tutor based on their learning needs and objectives.</p>
            </div>
        </div>
    </div>

    {{-- Our tutors --}}
    <div class="container bg-light shadow p-3 mb-5">
        <div class="mb-5">
            <h2 class="text-center fw-bold"><span class="text-danger">Our</span> tutors</h2>
            <hr style="width: 10%; height: 3px; background:#fb3b80; margin:auto;">
        </div>

        <div class="flexColumn d-flex justify-content-between align-items-center">
            <div class="tutor column rounded-circle mb-5">
                <div class="images mb-3">
                    <img class="photo rounded-circle" src="{{asset('images/tutor1.jpg')}}" alt="tutor">
                    <img class="star" src="{{asset('images/star.jpg')}}" width="50px" alt="">
                </div>
                <div class="text-center">
                    <h6>Mona ahmed</h6>
                    <p>9+ years of teaching English</p>
                </div>
            </div>
            <div class="tutor column rounded-circle mb-5">
                <div class="images mb-3">
                    <img class="photo rounded-circle" src="{{asset('images/tutor2.jpg')}}" alt="tutor">
                    <img class="star" src="{{asset('images/star.jpg')}}" width="50px" alt="star">
                </div>
                <div class="text-center">
                    <h6>Ahmed Mohamed</h6>
                    <p>12+ years of teaching English</p>
                </div>
            </div>
            <div class="tutor column rounded-circle mb-5">
                <div class="images mb-3">
                    <img class="photo rounded-circle" src="{{asset('images/tutor3.jpg')}}" alt="tutor">
                    <img class="star" src="{{asset('images/star.jpg')}}" width="50px" alt="star">
                </div>
                <div class="text-center">
                    <h6>Mostafa ibrahem</h6>
                    <p>7+ years of teaching English</p>
                </div>
            </div>
            <div class="tutor column rounded-circle mb-5">
                <div class="images mb-3">
                    <img class="photo rounded-circle" src="{{asset('images/tutor4.jpg')}}" alt="tutor">
                    <img class="star" src="{{asset('images/star.jpg')}}" width="50px" alt="">
                </div>
                <div class="text-center">
                    <h6>Marim ali</h6>
                    <p>5+ years of teaching English</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tutors FAQ --}}
    <div class="english m-5 p-2 bg-light shadow">
        <h4 class="text-center m-auto p-3"><span class="text-danger">Tutors</span> <span class="fw-bold">FAQ</span></h4>
        <div class="container text-center">
            <div class="learn">
                <h5 class="head">How do we select our tutors?</h5>
                <p class="desc">
                    At AKM, we carefully select our tutors based on their academic qualifications, teaching experience, and passion for education.
                    Our tutors are experienced educators, and subject matter experts with a track record of helping students achieve academic success.
                </p>
            </div>
            <div class="learn">
                <h5 class="head2">How do I know that your tutors are qualified to teach?</h5>
                <p class="desc2">
                    At Ostaz, we conduct rigorous background checks and interviews to ensure that our tutors meet our standards for quality and professionalism.
                    We also require our tutors to hold relevant academic degrees and teaching certifications, and we regularly evaluate their performance to ensure that they continue to meet our standards.
                </p>
            </div>
            <div class="learn">
                <h5 class="head3">What if I'm not satisfied with my tutoring experience?</h5>
                <p class="desc3">
                    At Ostaz, we are committed to providing our students with a positive and effective learning experience. If you are not satisfied with your tutoring experience for any reason,
                    please let us know and we will do our best to resolve the issue. We also offer a satisfaction guarantee, which means that if you are not satisfied with your learning experience, we will refund your money.
                </p>
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
    </script>

@endsection