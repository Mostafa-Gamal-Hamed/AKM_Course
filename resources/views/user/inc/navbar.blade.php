{{-- Nav bar --}}
<nav class="navbar navbar-expand-lg bg-dark animate__animated animate__fadeInDown animate__slow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">AKM<span style="color: #ea9215;">.</span></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="nav justify-content-end grid gap-2">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('courses') }}">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('ourTutors') }}">Our Tutors</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('pricing') }}">Pricing</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('aboutUs') }}">About us</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu bg-dark text-light">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="nav-link text-light">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                <li class="nav-item btn-cta">
                    <a class="nav-link" href="{{ url('contact') }}"><span>Contact us</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- SweetAlert --}}
@include('sweetalert::alert')
