<?php
namespace App\Traits;

trait ScoringTrait
{
    public function calculateScore($isCorrect, $marksPerQuestion, $wrongAnswerPenalty)
    {
        return $isCorrect ? $marksPerQuestion : -$wrongAnswerPenalty;
    }
}
