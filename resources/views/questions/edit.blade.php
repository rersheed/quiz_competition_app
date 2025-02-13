@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Question') }}</h1>

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

    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="quiz_id">Select Quiz</label>
            <select name="quiz_id" id="quiz_id" class="form-control" required>
                <option value="" disabled>-- Select a Quiz --</option>
                @foreach ($quizzes as $quiz)
                    <option value="{{ $quiz->id }}"
                        {{ old('quiz_id', $question->quiz_id) == $quiz->id ? 'selected' : '' }}>
                        {{ $quiz->name }} ({{ $quiz->date }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Question Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ old('description', $question->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="option_1">Option 1</label>
            <input type="text" name="option_1" class="form-control" id="option_1"
                value="{{ old('option_1', $question->option_1) }}" required>
        </div>

        <div class="form-group">
            <label for="option_2">Option 2</label>
            <input type="text" name="option_2" class="form-control" id="option_2"
                value="{{ old('option_2', $question->option_2) }}" required>
        </div>

        <div class="form-group">
            <label for="option_3">Option 3</label>
            <input type="text" name="option_3" class="form-control" id="option_3"
                value="{{ old('option_3', $question->option_3) }}" required>
        </div>

        <div class="form-group">
            <label for="option_4">Option 4</label>
            <input type="text" name="option_4" class="form-control" id="option_4"
                value="{{ old('option_4', $question->option_4) }}" required>
        </div>

        <div class="form-group">
            <label for="correct_option">Correct Option</label>
            <input type="text" name="correct_option" class="form-control" id="correct_option"
                value="{{ old('correct_option', $question->correct_option) }}" required>
        </div>

        <div class="form-group">
            <label for="instructions">Instructions</label>
            <textarea name="instructions" class="form-control" id="instructions">{{ old('instructions', $question->instructions) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Question</button>
    </form>
@endsection
