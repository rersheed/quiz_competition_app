<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'timer' => 'required|integer',
            'marks_per_question' => 'required|integer',
            'wrong_answer_marks' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'organiser' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
        ]);

        Quiz::create($validated);
        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'timer' => 'required|integer',
            'marks_per_question' => 'required|integer',
            'wrong_answer_marks' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'organiser' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
        ]);

        $quiz->update($validated);
        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }


    public function selectQuiz(Quiz $quiz)
    {
        $participants = $quiz->participants;

        return view('quizzes.select_participant', compact('quiz', 'participants'));
    }

    public function selectParticipant(Quiz $quiz, Participant $participant)
    {
        $questions = $quiz->questions;
        $unattemptedQuestions = $quiz->questions()->whereDoesntHave('answerLogs', function ($query) use ($quiz) {
            $query->where('quiz_id', $quiz->id);
        })->get();

        return view('quizzes.select_question', compact('quiz', 'participant', 'questions', 'unattemptedQuestions'));
    }



    public function selectQuestion(Quiz $quiz, Participant $participant)
    {
        $unattemptedQuestions = $quiz->questions()->whereDoesntHave('answerLogs', function ($query) use ($quiz) {
            $query->where('quiz_id', $quiz->id);
        })->get();

        return view('quizzes.start');
    }



}
