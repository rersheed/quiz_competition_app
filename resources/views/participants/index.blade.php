@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Participants') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('participants.create') }}" class="btn btn-primary">Add New Participant</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Quiz</th>
                <th>School Name</th>
                <th>Student 1</th>
                <th>Student 2</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($participants as $participant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $participant->quiz->name }}</td>
                    <td>{{ $participant->school_name }}</td>
                    <td>{{ $participant->student_1_name }}</td>
                    <td>{{ $participant->student_2_name }}</td>
                    <td>
                        <a href="{{ route('participants.edit', $participant) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('participants.destroy', $participant) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No Participants Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
