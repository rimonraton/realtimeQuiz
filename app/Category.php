<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function questioncount()
    {
        return $this->hasMany(Question::class)->where('status', 1);
    }
    public function easy()
    {
        return $this->hasMany(Question::class)->where('level', 1)->where('status', 1);
    }
    public function intermidiate()
    {
        return $this->hasMany(Question::class)->where('level', 2)->where('status', 1);
    }
    public function difficult()
    {
        return $this->hasMany(Question::class)->where('level', 3)->where('status', 1);
    }

    public function childs()
    {
        return $this->hasMany(Category::class, "sub_topic_id", "id")
            ->where('is_published',1)->withCount('questions');
    }
    public function parent()
    {
        return $this->hasOne(Category::class, "id", "sub_topic_id");
    }

    public function scopeAdmin($query)
    {
        $users = Admin::find(1)->users()->pluck('id');
        return $query->whereIn('user_id', $users);
    }
}
