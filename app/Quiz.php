<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

    public function quizCategory()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
