@extends('layouts.quiz')

@section('heading')
    <h1 class="text-center">Leaderboard for Quiz: {{ $quiz->name }}</h1>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>position</th>
                    <th>School</th>
                    <th>Questions answered</th>
                    <th>Correct Answers</th>
                    <th>Marks Per Question</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaderboard as $entry)
                    <tr class="@if ($entry['position'] == 1) winner @elseif($entry['position'] == $leaderboard[0]['position']) tie @endif">
                        <td>
                            {{ $entry['position'] }}

                        </td>
                        <td>{{ $entry['school_name'] }}</td>
                        <td>{{ $entry['total_questions'] }}</td>
                        <td>{{ $entry['correct_answers'] }}</td>
                        <td>{{ $entry['marks_per_question'] }}</td>
                        <td>{{ $entry['total_marks'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('back-button')
    <!-- Navigation -->
    <button class="btn btn-secondary btn-lg mt-3" onclick="window.location.href='{{ route('quizzes.index') }}'">
        Back to Quizzes
    </button>
@endsection

@push('styles')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        h1 {
            margin-bottom: 20px;
        }

        .table {
            width: 95%;
            margin: 20px auto;

            border-collapse: collapse;
            border: 5px solid #1c436a;
            border-image-slice: 1;
            border-image-source: linear-gradient(to right, red, blue, green, yellow, purple);
        }

        th,
        td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #1c436a;
            color: white;
        }

        tbody tr.winner {
            background-color: #a5b0ff;
            font-weight: bold;
        }

        tbody tr.tie {
            background-color: #a0f2ff;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endpush
