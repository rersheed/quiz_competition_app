@extends('layouts.quiz')
@section('heading')
    <h1 class="h3 mb-4 text-gray-800">{{ $quiz->name }}</h1>
@endsection
@section('subheading')
    <p>{{ $quiz->description }}</p>
@endsection
@section('content')

    <h4 class="question-info">Participants</h4>
    @isset($participants)
        @foreach ($participants as $participant)
            <button class="btn btn-secondary participant"
                onclick="window.location.href='{{ route('quizzes.participant.select', [$quiz->id, $participant->id]) }}'">
                {{ $loop->iteration }}. {{ $participant->school_name }}
            </button>
            &emsp;
        @endforeach
    @endisset
@endsection
@section('back-button')
    <!-- Navigation -->
    <button class="btn btn-secondary back-button" onclick="window.location.href='{{ route('quizzes.index') }}'">
        Exit
    </button>
@endsection
