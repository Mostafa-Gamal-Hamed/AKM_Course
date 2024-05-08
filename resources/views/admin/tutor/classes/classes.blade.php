@extends('admin.layout')

@section('Title')
    All Classes
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">All Classes</h1>
    <div class="container">
        {{-- Search --}}
        <div class="row">
            <div class="col-6">
                <h3 style="font-weight: bold;">Total = <span class="text-primary">{{ $count }}</span></h3>
            </div>
            <form action="{{ route('searchClass') }}" method="get" class="col-6 justify-content-end mb-3">
                @csrf
                <div class="row justify-content-between">
                    {{-- Search --}}
                    <div class="col-8">
                        <input type="text" name="searchName" class="form-control" id="search"
                            placeholder="Search By Name">
                        @error('searchName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary col-4"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        {{-- Table --}}
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Week</th>
                    <th>Reserved classes</th>
                    <th>Absent classes</th>
                    <th>Conducted Classes</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $class->week }}</td>
                        <td>{{ $class->reserved }}</td>
                        <td>{{ $class->absent }}</td>
                        <td>{{ $class->conducted }}</td>
                        <td>{{ $class->tutors_name }}</td>
                        <td>{{ $class->created_at->toDateString() }}</td>
                        <td>
                            <a href="{{ route('classDetails', "$class->id") }}" class="btn btn-info btn-circle">
                                <i class="fas fa-info"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('classDelete', "$class->id") }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-circle"
                                    onclick="return confirm('Are You sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Validation
        var search = document.getElementById("search");

        search.addEventListener("keyup", function() {
            const inputValue = search.value;

            if (!isNaN(inputValue)) {
                search.style.border = "2px solid red";
                searchError.style.color = "red";
            } else if (inputValue == "") {
                search.style.border = "2px solid red";
                searchError.style.color = "red";
            } else {
                search.style.border = "2px solid green";
                searchError.innerHTML = "";
            }
        });
    </script>
@endsection
