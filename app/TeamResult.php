<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamResult extends Model
{
    protected $guarded = [];

    public function quizname()
    {
        return $this->belongsTo(Quiz::class,'qid','id');
    }
}
