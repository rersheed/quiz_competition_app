<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answerLogs()
    {
        return $this->hasMany(AnswerLog::class);
    }

}
