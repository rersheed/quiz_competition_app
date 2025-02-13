@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Questions List') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('questions.create') }}" class="btn btn-primary">Add Question</a>
        <form action="{{ route('questions.uploadExcel') }}" method="POST" enctype="multipart/form-data"
            class="d-inline-block">
            @csrf
            <div class="form-group">
                <input type="file" name="file" accept=".xlsx,.csv" required>
            </div>
            <button type="submit" class="btn btn-success">Upload Excel</button>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Quiz</th>
                <th>Description</th>
                <th>Options</th>
                <th>Correct Option</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->quiz->name }}</td>
                    <td>{{ $question->description }}</td>
                    <td>
                        {{ $question->option_1 }}<br>
                        {{ $question->option_2 }}<br>
                        {{ $question->option_3 }}<br>
                        {{ $question->option_4 }}
                    </td>
                    <td>{{ $question->correct_option }}</td>
                    <td>
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
