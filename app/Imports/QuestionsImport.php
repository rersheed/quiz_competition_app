<?php
namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel
{
    public function model(array $row)
    {
        // Skip header row
        if ($row[0] == 'Quiz ID') {
            return null;
        }

        return new Question([
            'quiz_id' => (int) $row[0], // Ensure it's cast to integer
            'description' => $row[1],
            'option_1' => $row[2],
            'option_2' => $row[3],
            'option_3' => $row[4],
            'option_4' => $row[5],
            'correct_option' => $row[6],
            'instructions' => $row[7],
        ]);
    }
}

