@extends('admin.layout')

@section('Title')
    Edit Level 1
@endsection

@section('Body')
    <h1 class="text-dark text-center font-weight-bold mb-5">Edit Level {{ $level->level }}</h1>
    <div class="d-flex">
        <div class="col">
            <iframe src="{{ asset("storage/$level->book") }}" width="100%" height="400px"></iframe>
        </div>
        <div class="col">
            <form action="{{ route('updateCurriculum', "$level->id") }}" method="post" class="col-9"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Level --}}
                <div class="mb-2">
                    <select name="level" id="level" class="custom-select">
                        <option value="{{ $level->level }}">Level {{ $level->level }}</option>
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
                    @error('level')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <span id="levelError"></span>
                </div>
                {{-- File --}}
                <div>
                    <label for="book">Upload Book</label>
                    <input type="file" class="form-control mb-3" name="book" id="book"
                        accept=".pdf,.doc,.docx,.xlsx">
                    @error('book')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <span id="bookError"></span>
                </div>
                <button type="submit" class="btn btn-success" id="button">Upload</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Level
            $('#level').on('change', function() {
                if ($('#level').val() > 14) {
                    $('#level').css('border', '2px solid red');
                    $('#levelError').html('The level is greater than 14');
                    $('#levelError').css('color', 'red');
                    $('#button').css('display', 'none');
                } else if ($('#level').val() == 0) {
                    $('#level').css('border', '2px solid red');
                    $('#levelError').html('The level is empty');
                    $('#levelError').css('color', 'red');
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
