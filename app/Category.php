<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function exams()
    {
    	return $this->hasMany(Exam::class);
    }
}
