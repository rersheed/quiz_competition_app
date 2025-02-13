<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerLog extends Model
{
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
