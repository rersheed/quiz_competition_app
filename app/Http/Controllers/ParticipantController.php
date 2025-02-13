<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Quiz;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        $quizzes = Quiz::all(); // Fetch all quizzes from the database
        return view('participants.create', compact('quizzes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'student_1_name' => 'required|string|max:255',
            'student_2_name' => 'required|string|max:255',
        ]);

        Participant::create($validated);
        return redirect()->route('participants.index')->with('success', 'Participant added successfully.');
    }

    public function edit(Participant $participant)
    {
        $quizzes = Quiz::all(); // Fetch all quizzes from the database
        return view('participants.edit', compact('participant', 'quizzes'));
    }

    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'student_1_name' => 'required|string|max:255',
            'student_2_name' => 'required|string|max:255',
        ]);

        $participant->update($validated);
        return redirect()->route('participants.index')->with('success', 'Participant updated successfully.');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant deleted successfully.');
    }
}
