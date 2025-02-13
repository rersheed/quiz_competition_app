<?php

namespace App\Services;

use App\Models\Quiz;
use App\Models\AnswerLog;
use App\Models\Leaderboard;
use Barryvdh\DomPDF\Facade\Pdf;

class LeaderboardService
{
    /**
     * Generate leaderboard data for a quiz.
     *
     * @param Quiz $quiz
     * @return array
     */
    public function generate(Quiz $quiz)
    {
        $participants = $quiz->participants;
        $leaderboard = [];

        foreach ($participants as $participant) {
            // Fetch participant's answers
            $answers = AnswerLog::where('quiz_id', $quiz->id)
                ->where('participant_id', $participant->id)
                ->get();

            $totalQuestions = $answers->count();
            $correctAnswers = $answers->where('is_correct', true)->count();
            $incorrectAnswers = $totalQuestions - $correctAnswers;

            // Calculate total marks
            $totalMarks = $answers->sum(function ($log) use ($quiz) {
                return $log->is_correct
                    ? $quiz->marks_per_question
                    : -$quiz->wrong_answer_marks;
            });

            $leaderboard[] = [
                'quiz_id' => $quiz->id,
                'school_name' => $participant->school_name,
                'student_name' => $participant->student_name,
                'total_questions' => $totalQuestions,
                'correct_answers' => $correctAnswers,
                'incorrect_answers' => $incorrectAnswers,
                'marks_per_question' => $quiz->marks_per_question,
                'total_marks' => $totalMarks,
                'position' => 0, // Placeholder for sorting
            ];
        }

        // Sort leaderboard by total_marks descending
        usort($leaderboard, function ($a, $b) {
            return $b['total_marks'] <=> $a['total_marks'];
        });

        // Assign positions with ties
        $previousMarks = null;
        $currentPosition = 0;

        foreach ($leaderboard as $index => &$entry) {
            if ($entry['total_marks'] !== $previousMarks) {
                $currentPosition = $index + 1;
            }
            $entry['position'] = $currentPosition;
            $previousMarks = $entry['total_marks'];
        }

        return $leaderboard;
    }


    /**
     * Export leaderboard as a PDF.
     *
     * @param Quiz $quiz
     * @param array $leaderboard
     * @return mixed
     */
    public function exportAsPDF(Quiz $quiz, array $leaderboard)
    {
        $pdf = Pdf::loadView('leaderboard.pdf', [
            'quiz' => $quiz,
            'leaderboard' => $leaderboard,
        ]);

        return $pdf->download('leaderboard_' . $quiz->id . '.pdf');
    }
}
