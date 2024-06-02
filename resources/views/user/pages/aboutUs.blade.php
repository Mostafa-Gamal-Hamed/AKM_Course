@extends('user.layout')

@section('Title')
    {{__("messages.About us")}}
@endsection

<style>
    /* Header */
    header{
        height: 500px !important;
        margin-bottom: 50px;
    }

    .aboutAkm{
        transition: 0.5s ease-in-out;
    }
    .aboutAkm:hover{
        box-shadow: 0px 0px 15px 10px green;
    }
    .aboutMission{
        transition: 0.5s ease-in-out;
    }
    .aboutMission:hover{
        box-shadow: 0px 0px 15px 10px black;
    }
    .aboutLang{
        transition: 0.5s ease-in-out;
    }
    .aboutLang:hover{
        box-shadow: 0px 0px 15px 10px rgb(209, 209, 209);
    }

    /* Hr */
    .first{
        width: 60px;
        margin-bottom: 10px;
        padding: 2px;
        background-color: white !important;
    }

    video{
        width: 100%;
        border-radius: 20px;
    }

</style>

@section('Body')
    {{-- Header --}}
    <header>
        <img src="{{asset('images/aboutUs.jpg')}}" height="100%" width="100%"  alt="Blog">
    </header>

    {{-- Our expert language --}}
    <div id="fh5co-explore" class="fh5co-bg-section shadow-lg mb-5" style="background-color: #03144f;">
        <div class="container">
            <div class="text-center text-light">
                <h4 class="fw-bold text-light">{{__("messages.We are on a mission to develop well-rounded students and prepare all generations for a better future.")}}</h4>
                <hr class="first m-auto">
                <p class="w-50 m-auto">{{__("messages.We help you gain confidence and improve your speaking, pronunciation and vocabulary.")}}</p>
            </div>
        </div>
    </div>

    {{-- About us --}}
    <div class="container shadow bg-light mb-5 rounded">
        <div class="aboutUs flexColumn d-flex justify-content-center align-items-center p-3">
            <div class="col-6 column">
                <h3 class="fw-bold">{{__("messages.About AKM Language Courses")}}</h3>
                <h5>
                    {{__("messages.AKM Language Courses is a leading provider of comprehensive language learning solutions designed to empower individuals with the skills and confidence to communicate effectively in diverse linguistic environments. Established with a vision to bridge cultural divides and facilitate global communication, AKM Language Courses has been dedicated to delivering high-quality language education since it's inception.")}}
                </h5>
            </div>
            <div class="col-6 column text-center">
                <img src="{{asset('images/aboutus1.jpg')}}" class="aboutAkm img-fluid w-75 rounded" alt="AKM Image">
            </div>
        </div>
        <hr>
        <div class="aboutUs flexColumn d-flex justify-content-center align-items-center p-3">
            <div class="col-6 column text-center">
                <img src="{{asset('images/aboutus2.jpg')}}" class="aboutMission img-fluid w-75 rounded" alt="AKM Image">
            </div>
            <div class="col-6 column mb-2">
                <h3 class="fw-bold">{{__("messages.Our Mission")}}</h3>
                <h5>
                    {{__("messages.At AKM Language Courses, our mission is to break down language barriers and foster intercultural understanding through innovative and immersive language learning experiences. We believe that language is not just a means of communication but a gateway to cultural enrichment and personal growth. Our goal is to equip learners with the linguistic tools they need to navigate the complexities of our interconnected world with ease and fluency.")}}
                </h5>
            </div>
        </div>
        <hr>
        <div class="aboutUs flexColumn d-flex justify-content-center align-items-center p-3">
            <div class="col-6 column">
                <h3 class="fw-bold">{{__("messages.Comprehensive Language Solutions")}}</h3>
                <h5>
                    {{__("messages.We offer a wide range of language courses tailored to meet the unique needs and preferences of our diverse clientele. Whether you're a beginner looking to master the basics or an advanced learner striving for proficiency, we have the perfect course for you. Our experienced instructors employ cutting-edge teaching methodologies and immersive learning techniques to ensure optimal outcomes for our students.")}}
                </h5>
            </div>
            <div class="col-6 column text-center">
                <img src="{{asset('images/aboutus3.jpg')}}" class="aboutLang img-fluid w-75 rounded" alt="AKM Image">
            </div>
        </div>
        <hr>
        <div class="aboutUs flexColumn d-flex justify-content-between grid gap-2 p-3">
            <div class="col column text-center">
                <video src="{{asset('images/aboutUs.mp4')}}" loop controls autoplay></video>
            </div>
            <div class="col column">
                <h3 class="fw-bold">{{__("messages.Key Features of AKM Language Courses")}}</h3>
                <h5>
                    <b>{{__("messages.Flexible Learning Options:")}}</b> {{__("messages.We understand that everyone has different schedules and learning styles. That's why we offer flexible learning options, including in-person classes, online courses, and hybrid learning models, to accommodate our students' needs.")}}
                </h5>
                <hr>
                <h5>
                    <b>{{__("messages.Expert Instructors:")}}</b> {{__("messages.Our team of highly qualified instructors are not only native speakers but also experts in language teaching methodologies. They are dedicated to providing personalized attention and support to help students reach their language learning goals.")}}
                </h5>
                <hr>
                <h5>
                    <b>{{__("messages.Interactive Learning Materials:")}}</b> {{__("messages.We believe in making learning engaging and interactive. Our courses feature a variety of multimedia resources, interactive exercises, and real-world simulations to enhance the learning experience and promote retention.")}}
                </h5>
                <hr>
                <h5>
                    <b>{{__("messages.Progress Tracking:")}}</b> {{__("messages.We provide regular assessments and progress tracking tools to monitor each student's advancement and identify areas for improvement. This allows us to tailor our instruction to meet the individual needs of our students and ensure steady progress.")}}
                </h5>
                <hr>
                <h5>
                    <b>{{__("messages.Cultural Enrichment:")}}</b> {{__("messages.Language learning is not just about grammar and vocabulary; it's also about understanding and appreciating different cultures. Our courses incorporate cultural elements to provide students with a well-rounded understanding of the language they are learning.")}}
                </h5>
            </div>
        </div>
        <hr>
        <div class="text-center p-3">
            <img src="{{asset('images/joinUus.png')}}" class="aboutLang img-fluid text-center mb-5 w-50 m-auto" alt="join us">
            <h5>
                {{__("messages.Whether you're looking to learn a new language for travel, business, or personal enrichment, AKM Language Courses is here to help you succeed. Join us today and embark on a journey of linguistic discovery and cultural exploration. Let us help you unlock the world of opportunities that fluency in another language can offer.")}}
            </h5>
            <a href="{{url('contact')}}" class="btn btn-outline-warning btn-lg">{{__("messages.Join Us")}}</a>
        </div>
    </div>

    <script>
        // change flex-row to flex-column
        // $(document).ready(function () {
        //     var windowWidth = $(window).width();
        //     var about = $(".aboutUs");
        //     var image = about.find("img");
        //     var video = about.find("video");
        //     var div   = about.find("div");

        //     if (windowWidth <= 600) {
        //         about.addClass("flex-column");
        //         $(div).removeClass("col-6");
        //         $(image).removeClass("w-75");
        //         $(video).css("width","100%");
        //     } else {
        //         about.removeClass("flex-column");
        //     }
        // });
    </script>

@endsection