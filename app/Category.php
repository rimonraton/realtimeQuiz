<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function childs()
    {
        return $this->hasMany(Category::class, "sub_topic_id", "id")->where('is_published',1);
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
