<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    // public function subject()
    // {
    // 	return $this->belongsTo(Subject::class);
    // }
    // public function course()
    // {
    // 	return $this->belongsTo(Course::class);
    // }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);

    }

}
