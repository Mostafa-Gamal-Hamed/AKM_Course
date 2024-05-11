@extends('user.layout')

@section('Title')
    AKM Blog
@endsection

<style>
    /* Header */
    header{
        height: 500px !important;
    }

    /* Blog */
    .blog img{
        width: 100%;
    }
    .blog p{
        max-height: 80px;
        overflow: hidden;
    }
    .blog a{
        transition: 0.5s ease;
    }
    .blog a:hover{
        padding: 0.45rem !important;
    }
</style>

@section("Body")
    {{-- Header --}}
    <header>
        <img src="{{asset('images/blogs.jpg')}}" height="100%" width="100%"  alt="Blog">
    </header>

    {{-- Blog --}}
    <div class="container bg-light shadow mt-5 mb-5 text-center p-3">
        <div class="flexColumn d-flex justify-content-center align-items-center grid gap-5 mb-5">
            <div class="blog column col border rounded">
                <img src="{{asset('images/blog1.png')}}" class="rounded" alt="Blog Img">
                <div class="bg-danger w-100" style="height: 5px;"></div>
                <div style="background-color: white;">
                    <h5 class="mt-3">Lorem ipsum dolor sit amet</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet expedita quas labore pariatur iure porro odit hic, et reiciendis?</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span>12/03/2024</span>
                    <a href="{{url('showBlog/id')}}" class="btn btn-outline-primary btn-sm p-1">Read More</a>
                </div>
            </div>
            <div class="blog column col border rounded">
                <img src="{{asset('images/blog2.png')}}" class="rounded" alt="Blog Img">
                <div class="bg-danger w-100" style="height: 5px;"></div>
                <div style="background-color: white;">
                    <h5 class="mt-3">Lorem ipsum dolor sit amet</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet expedita quas labore pariatur iure porro odit hic, et reiciendis?</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span>12/03/2024</span>
                    <a href="{{url('showBlog/id')}}" class="btn btn-outline-primary btn-sm p-1">Read More</a>
                </div>
            </div>
            <div class="blog column col border rounded">
                <img src="{{asset('images/blog3.png')}}" class="rounded" alt="Blog Img">
                <div class="bg-danger w-100" style="height: 5px;"></div>
                <div style="background-color: white;">
                    <h5 class="mt-3">Lorem ipsum dolor sit amet</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet expedita quas labore pariatur iure porro odit hic, et reiciendis?</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span>12/03/2024</span>
                    <a href="{{url('showBlog/id')}}" class="btn btn-outline-primary btn-sm p-1">Read More</a>
                </div>
            </div>
        </div>
        <div class="flexColumn d-flex justify-content-center align-items-center grid gap-5 mb-5">
            <div class="blog column col border rounded">
                <img src="{{asset('images/blog1.png')}}" class="rounded" alt="Blog Img">
                <div class="bg-danger w-100" style="height: 5px;"></div>
                <div style="background-color: white;">
                    <h5 class="mt-3">Lorem ipsum dolor sit amet</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet expedita quas labore pariatur iure porro odit hic, et reiciendis?</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span>12/03/2024</span>
                    <a href="{{url('showBlog/id')}}" class="btn btn-outline-primary btn-sm p-1">Read More</a>
                </div>
            </div>
            <div class="blog column col border rounded">
                <img src="{{asset('images/blog2.png')}}" class="rounded" alt="Blog Img">
                <div class="bg-danger w-100" style="height: 5px;"></div>
                <div style="background-color: white;">
                    <h5 class="mt-3">Lorem ipsum dolor sit amet</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet expedita quas labore pariatur iure porro odit hic, et reiciendis?</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span>12/03/2024</span>
                    <a href="{{url('showBlog/id')}}" class="btn btn-outline-primary btn-sm p-1">Read More</a>
                </div>
            </div>
            <div class="blog column col border rounded">
                <img src="{{asset('images/blog3.png')}}" class="rounded" alt="Blog Img">
                <div class="bg-danger w-100" style="height: 5px;"></div>
                <div style="background-color: white;">
                    <h5 class="mt-3">Lorem ipsum dolor sit amet</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet expedita quas labore pariatur iure porro odit hic, et reiciendis?</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span>12/03/2024</span>
                    <a href="{{url('showBlog/id')}}" class="btn btn-outline-primary btn-sm p-1">Read More</a>
                </div>
            </div>
        </div>
    </div>

@endsection