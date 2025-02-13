@extends('layouts.quiz')

@section('heading')
    Quiz: {{ $quiz->name }}
@endsection

@section('subheading')
    Participant: <span class="text-info">{{ $participant->school_name }}</span>
@endsection

@section('content')
    <!-- Question Section -->
    <div class="question-info">
        <h2>{{ $question->description }}</h2>
    </div>

    <!-- Options Section -->
    <div class="options-grid">
        <button class="option-button" id="A" onclick="submitAnswer('A')">A. &emsp; {{ $question->option_1 }}</button>
        <button class="option-button" id="B" onclick="submitAnswer('B')">B. &emsp; {{ $question->option_2 }}</button>
        <button class="option-button" id="C" onclick="submitAnswer('C')">C. &emsp; {{ $question->option_3 }}</button>
        <button class="option-button" id="D" onclick="submitAnswer('D')">D. &emsp;
            {{ $question->option_4 }}</button>
    </div>

    <!-- Modal Section -->
    <div id="resultModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div id="resultIcon" class="result-icon"></div>
            </div>
            <div class="modal-body">
                <h3 id="resultMessage" class="result-message"></h3>
            </div>
            <div class="modal-footer">
                <button class="btn back-button" onclick="redirectToParticipants()">OK</button>
            </div>
        </div>
    </div>
@endsection

@section('back-button')
    <!-- Navigation -->
    <button class="btn btn-secondary back-button" onclick="window.location.href='{{ route('quizzes.start', $quiz->id) }}'">
        Back to Participants
    </button>
@endsection

@push('scripts')
    <script>
        function submitAnswer(option) {
            const quizId = {{ $quiz->id }};
            const participantId = {{ $participant->id }};
            const questionId = {{ $question->id }};
            const timeTaken = 30; // Replace with dynamic value if tracking time

            if (confirm("Are you sure about your answer?")) {
                fetch(`/quizzes/${quizId}/answer`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        body: JSON.stringify({
                            quiz_id: quizId,
                            participant_id: participantId,
                            question_id: questionId,
                            selected_option: option,
                            time_taken: timeTaken,
                        }),
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok");
                        }
                        return response.json();
                    })
                    .then(data => {
                        showResultModal(data.message, data.is_correct);
                    })
                    .catch(error => {
                        console.error(error);
                        alert("An error occurred. Please try again.");
                    });
            }
        }

        function showResultModal(message, isCorrect) {
            const modal = document.getElementById('resultModal');
            const resultMessage = document.getElementById('resultMessage');
            const resultIcon = document.getElementById('resultIcon');

            resultMessage.textContent = message;

            if (isCorrect) {
                resultIcon.innerHTML = '✅';
                resultIcon.style.color = 'green';
            } else {
                resultIcon.innerHTML = '❌';
                resultIcon.style.color = 'red';
            }

            // Add rainbow border
            // resultIcon.style.border = "6px solid";
            // resultIcon.style.borderImage = "linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet) 1";

            modal.style.display = 'flex';
        }

        function redirectToParticipants() {
            window.location.href = '{{ route('quizzes.start', $quiz->id) }}';
        }
    </script>
@endpush

@push('styles')
    <style>
        /* Modal Styling */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: #001f3f;
            /* Dark blue background */
            color: white;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-header .result-icon {
            font-size: 80px;
            /* Large icon size */
            margin-bottom: 20px;
            border-radius: 50%;
            padding: 10px;
            display: inline-block;
        }

        .result-message {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .modal-footer .back-button {
            background-color: #4CAF50;
            /* Back button green color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-footer .back-button:hover {
            background-color: #45a049;
        }
    </style>
@endpush
