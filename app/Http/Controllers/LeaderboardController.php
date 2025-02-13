<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Leaderboard;
use App\Services\LeaderboardService;

class LeaderboardController extends Controller
{
    protected $leaderboardService;

    public function __construct(LeaderboardService $leaderboardService)
    {
        $this->leaderboardService = $leaderboardService;
    }

    /**
     * Generate leaderboard for a quiz.
     *
     * @param Quiz $quiz
     */
    public function generate(Quiz $quiz)
    {
        $leaderboard = $this->leaderboardService->generate($quiz);

        // Save to the database
        // Leaderboard::upsert($leaderboardData, ['quiz_id', 'participant_id'], ['total_marks', 'position', 'total_time']);

        return view('leaderboards.index', compact('leaderboard', 'quiz'));
    }

    /**
     * Export leaderboard as PDF.
     *
     * @param Quiz $quiz
     * @return \Illuminate\Http\Response
     */
    public function exportPDF(Quiz $quiz)
    {
        $leaderboardData = $this->leaderboardService->generate($quiz);

        return $this->leaderboardService->exportAsPDF($quiz, $leaderboardData);
    }
}
