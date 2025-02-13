@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Add Participant') }}</h1>

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

    <form action="{{ route('participants.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="quiz_id">Select Quiz</label>
            <select name="quiz_id" id="quiz_id" class="form-control" required>
                <option value="" disabled selected>-- Select a Quiz --</option>
                @foreach ($quizzes as $quiz)
                    <option value="{{ $quiz->id }}" {{ old('quiz_id') == $quiz->id ? 'selected' : '' }}>
                        {{ $quiz->name }} ({{ $quiz->date }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="school_name">School Name</label>
            <input type="text" name="school_name" class="form-control" id="school_name" value="{{ old('school_name') }}"
                required>
        </div>

        <div class="form-group">
            <label for="student_1_name">Student 1 Name</label>
            <input type="text" name="student_1_name" class="form-control" id="student_1_name"
                value="{{ old('student_1_name') }}" required>
        </div>

        <div class="form-group">
            <label for="student_2_name">Student 2 Name</label>
            <input type="text" name="student_2_name" class="form-control" id="student_2_name"
                value="{{ old('student_2_name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Participant</button>
    </form>
@endsection
