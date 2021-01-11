<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class,'quizcategory_id');
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
