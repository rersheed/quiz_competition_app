@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Add Question') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h3>Bulk Upload Questions</h3>
    <p>You can upload multiple questions at once using the <strong>Excel Template</strong>.</p>
    <a href="{{ asset('templates/question_upload_template.xlsx') }}" class="btn btn-success">Download Excel Template</a>

    <hr>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="quiz_id">Select Quiz</label>
            <select name="quiz_id" id="quiz_id" class="form-control" required>
                <option value="" disabled>-- Select a Quiz --</option>
                @foreach ($quizzes as $quiz)
                    <option value="{{ $quiz->id }}" {{ old('quiz_id') == $quiz->id ? 'selected' : '' }}>
                        {{ $quiz->name }} ({{ $quiz->date }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Question Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="option_1">Option 1</label>
            <input type="text" name="option_1" class="form-control" id="option_1" value="{{ old('option_1') }}"
                required>
        </div>

        <div class="form-group">
            <label for="option_2">Option 2</label>
            <input type="text" name="option_2" class="form-control" id="option_2" value="{{ old('option_2') }}"
                required>
        </div>

        <div class="form-group">
            <label for="option_3">Option 3</label>
            <input type="text" name="option_3" class="form-control" id="option_3" value="{{ old('option_3') }}"
                required>
        </div>

        <div class="form-group">
            <label for="option_4">Option 4</label>
            <input type="text" name="option_4" class="form-control" id="option_4" value="{{ old('option_4') }}"
                required>
        </div>

        <div class="form-group">
            <label for="correct_option">Correct Option</label>
            <input type="text" name="correct_option" class="form-control" id="correct_option"
                value="{{ old('correct_option') }}" required>
        </div>

        <div class="form-group">
            <label for="instructions">Instructions</label>
            <textarea name="instructions" class="form-control" id="instructions">{{ old('instructions') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Question</button>
    </form>

@endsection
