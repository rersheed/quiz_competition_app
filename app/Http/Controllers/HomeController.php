<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Question;
use App\Models\AnswerLog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            'total_quizzes' => Quiz::count(),
            'total_users' => User::count(),
            'participants' => Participant::count(),
            'total_questions' => Question::count(),
            'average_score' => AnswerLog::count(), // Assuming there's a results table with a 'score' column
            'recent_quizzes' => Quiz::latest()->take(5)->get(), // Fetch latest 5 quizzes

        ];

        return view('home', compact('widget'));
    }
}
