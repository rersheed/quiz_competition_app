@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create Quiz') }}</h1>

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

    <form action="{{ route('quizzes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Quiz Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="timer">Timer (in minutes)</label>
            <input type="number" name="timer" class="form-control" id="timer" value="{{ old('timer') }}" required>
        </div>

        <div class="form-group">
            <label for="marks_per_question">Marks Per Question</label>
            <input type="number" name="marks_per_question" class="form-control" id="marks_per_question"
                value="{{ old('marks_per_question') }}" required>
        </div>

        <div class="form-group">
            <label for="wrong_answer_marks">Negative Marks for Wrong Answer</label>
            <input type="number" name="wrong_answer_marks" class="form-control" id="wrong_answer_marks"
                value="{{ old('wrong_answer_marks') }}" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" id="date"  value="{{ old('date') }}" required>
        </div>

        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" name="time" class="form-control" id="time" value="{{ old('time') }}" required>
        </div>

        <div class="form-group">
            <label for="organiser">Organiser</label>
            <input type="text" name="organiser" class="form-control" id="organiser" value="{{ old('organiser') }}"
                required>
        </div>

        <div class="form-group">
            <label for="venue">Venue</label>
            <input type="text" name="venue" class="form-control" id="venue" value="{{ old('venue') }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Create Quiz</button>
    </form>
@endsection
