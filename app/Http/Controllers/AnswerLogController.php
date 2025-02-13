<?php
namespace App\Http\Controllers;

use App\Models\AnswerLog;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class AnswerLogController extends Controller
{
    public function create(Quiz $quiz, Participant $participant, Question $question)
    {
        return view('quizzes.answer_question', compact('quiz', 'participant', 'question'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        // try {
        // Validate the incoming request
        $validated = $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'question_id' => 'required|exists:questions,id',
            'selected_option' => 'required|string',
            'time_taken' => 'nullable|integer', // Time is optional
        ]);

        // Retrieve the question and check correctness
        $question = Question::findOrFail($validated['question_id']);
        $isCorrect = $question->correct_option === $validated['selected_option'];

        // Store the answer log
        AnswerLog::create([
            'quiz_id' => $quiz->id,
            'participant_id' => $validated['participant_id'],
            'question_id' => $validated['question_id'],
            'selected_option' => $validated['selected_option'],
            'is_correct' => $isCorrect,
            'time_taken' => $validated['time_taken'] ?? 0, // Default to 0 if not provided
        ]);

        // Return JSON response
        return response()->json([
            'message' => $isCorrect ? 'Correct' : 'Wrong',
            'is_correct' => $isCorrect,
        ]);
        // } catch (\Exception $e) {
        //     // Return JSON error response
        //     return response()->json([
        //         'message' => 'An error occurred: ' . $e->getMessage(),
        //     ], 500);
        // }
    }



}
