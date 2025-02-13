@extends('layouts.quiz')

@section('heading')
    <h1 class="h3 mb-4 text-gray-800">{{ $quiz->name }}</h1>
@endsection

@section('subheading')
    <h2>Participants: <u>{{ $participant->school_name }}</u></h2>
@endsection

@section('content')
    <h4 class="question-info">Questions</h4>
    <div class="questions-grid">
        @foreach ($questions as $index => $question)
            @php
                $isUnattempted = $unattemptedQuestions->contains('id', $question->id);
            @endphp
            @if ($isUnattempted)
                <!-- Active Question -->
                <div class="question-circle active"
                    onclick="window.location.href='{{ route('answer.question', ['quiz' => $quiz->id, 'participant' => $participant->id, 'question' => $question->id]) }}'">
                    {{ $index + 1 }}
                </div>
            @else
                <!-- Inactive Question -->
                <div class="question-circle inactive">
                    {{ $index + 1 }}
                </div>
            @endif
        @endforeach
    </div>
@endsection

@section('back-button')
    <!-- Navigation -->
    <button class="btn btn-secondary back-button" onclick="window.location.href='{{ route('quizzes.start', $quiz->id) }}'">
        Back to Participants
    </button>
@endsection
