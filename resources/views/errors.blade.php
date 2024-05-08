@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="container">
            <div class="alert alert-danger text-center">
                <i class="fas fa-times"></i> {{$error}}
            </div>
        </div>
    @endforeach
@endif