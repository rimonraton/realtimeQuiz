<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function existUser()
    {
        return $this->hasMany(ExamGivenUser::class, 'exam_id');
    }
}
