@if (session()->get("success"))
    <div class="container">
        <div class="alert alert-success">
            <i class="fas fa-check"></i> {{session()->get("success")}}
        </div>
    </div>
@endif