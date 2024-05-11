{{-- Header --}}
@include("admin.inc.header")

{{-- SideBar --}}
@include("admin.inc.sidebar")

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        {{-- NavBar --}}
        @include("admin.inc.navbar")

        {{-- Body --}}
        @yield("Body")
    </div>
</div>

{{-- Footer --}}
@include("admin.inc.footer")