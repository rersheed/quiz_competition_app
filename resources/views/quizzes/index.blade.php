@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('List of Quizzes') }}</h1>

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

    <a href="{{ route('quizzes.create') }}" class="btn btn-primary mb-3">Create New Quiz</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Timer</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->id }}</td>
                    <td>{{ $quiz->name }}</td>
                    <td>{{ $quiz->description }}</td>
                    <td>{{ $quiz->timer }} minutes</td>
                    <td>{{ $quiz->date }}</td>
                    <td>
                        <a href="{{ route('quizzes.edit', $quiz) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('quizzes.destroy', $quiz) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('quizzes.start', $quiz) }}" class="btn btn-success btn-sm">Start Quiz</a>
                        <a href="{{ route('leaderboards.generate', $quiz->id) }}"
                            class="btn btn-primary btn-sm">Results</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No quizzes available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
