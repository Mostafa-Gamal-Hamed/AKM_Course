@extends('admin.layout')

@section('Title')
    Curriculums
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">All Curriculums</h1>
    <div class="container">
        {{-- Add curriculums --}}
        <div class="w-100 mb-3">
            <div class="row justify-content-end">
                <form action="{{ route('storeCurriculum') }}" method="post" class="col-9" id="curriculumForm"
                    style="display: none;" enctype="multipart/form-data">
                    @csrf
                    <div class="row flexColumn">
                        {{-- Levels --}}
                        <div class="col column">
                            <select name="level" id="level" class="custom-select">
                                <option hidden>Select Level</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option>
                                <option value="4">Level 4</option>
                                <option value="5">Level 5</option>
                                <option value="6">Level 6</option>
                                <option value="7">Level 7</option>
                                <option value="8">Level 8</option>
                                <option value="9">Level 9</option>
                                <option value="10">Level 10</option>
                                <option value="11">Level 11</option>
                                <option value="12">Level 12</option>
                                <option value="13">Level 13</option>
                                <option value="14">Level 14</option>
                            </select>
                            <span id="levelError"></span>
                        </div>
                        {{-- File --}}
                        <div class="col column">
                            <input type="file" name="book" value="{{ old('book') }}" class="form-control"
                            id="book" accept=".pdf,.doc,.docx,.xlsx" required>
                            <span id="bookError"></span>
                        </div>
                        <button type="submit" class="btn btn-success col column" id="button">Upload</button>
                    </div>
                </form>
                <li class="nav-link col-3">
                    <p style="cursor: pointer;" id="addCurriculum">
                        <i class="fas fa-plus text-warning"></i>
                        <span>Add Curriculum</span>
                    </p>
                </li>
            </div>
        </div>
        {{-- Curriculums --}}
        <div class="row flexColumn justify-content-center w-100">
            @foreach ($levels as $level)
                <div class="card column shadow mb-3 py-2" style="width: 25%">
                    <div class="card-body">
                        <a href="{{ route('showCurriculum', "$level->id") }}" class="nav-link" target="__blank" title="Show">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Level {{$level->level}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-layer-group" style="font-size: 20px;"></i>
                                </div>
                            </div>
                        </a>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <a href="{{ route('editCurriculum', "$level->id") }}" class="btn btn-primary btn-circle" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('deleteCurriculum', "$level->id") }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-circle"
                                    onclick="return confirm('Are you Sure?')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Jquery Validation --}}
    <script>
        $(document).ready(function() {
            // Level
            $('#level').on('change',function() {
                if($('#level').val() > 14) {
                    $('#level').css('border', '2px solid red');
                    $('#levelError').html('The level is greater than 14');
                    $('#levelError').css('color','red');
                    $('#button').css('display', 'none');
                } else if($('#level').val() == 0) {
                    $('#level').css('border', '2px solid red');
                    $('#levelError').html('The level is empty');
                    $('#levelError').css('color','red');
                    $('#button').css('display', 'none');
                } else {
                    $('#level').css('border', '2px solid green');
                    $('#levelError').html('');
                    $('#button').css('display', 'block');
                }
            });
            // Book
            $('#book').on('change', function(event) {
                var file = event.target.files[0];
                if (file) {
                    var fileName = file.name.toLowerCase();
                    if (
                        file.type === 'application/pdf' ||
                        fileName.endsWith('.pdf')
                    ) {
                        $('#book').css('border', '2px solid green');
                        $('#bookError').html('');
                        $('#button').css('display', 'block');
                    } else if (
                        fileName.endsWith('.doc') ||
                        fileName.endsWith('.docx') ||
                        fileName.endsWith('.xlsx') ||
                        file.type === 'application/msword' ||
                        file.type ===
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ) {
                        $('#book').css('border', '2px solid green');
                        $('#bookError').html('');
                        $('#button').css('display', 'block');
                    } else {
                        $('#book').css('border', '2px solid red');
                        $('#bookError').html('The selected file is not a PDF or Word File.');
                        $('#bookError').css('color', 'red');
                        $('#button').css('display', 'none');
                    }
                }
            });
        });
    </script>

@endsection
