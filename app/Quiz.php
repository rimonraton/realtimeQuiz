<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function progress()
    {
    	return $this->hasMany(Progress::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
}
