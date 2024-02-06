<?php

namespace App\Models;

use App\Category;
use App\Question;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $guarded = [];
    public function share()
    {
        return $this->hasMany(Share::class);
    }
    public function getCategoryAttribute()
    {
        if (!$this->relationLoaded('category')) {
            $category = Category::whereIn('id', explode(',', $this->cat_id))
                ->select('id', 'name', 'bn_name')
                ->withCount('questions')
                ->get();
            $this->setRelation('category', $category);
        }

        return $this->getRelation('category');
    }
    public function getQuestionTypeAttribute()
    {
        if (!$this->relationLoaded('question')) {
            $question_type = Question::whereIn('id', explode(',', $this->question_id))
                ->pluck('fileType')
                ->unique();
            $this->setRelation('question_type', $question_type);
        }

        return $this->getRelation('question_type');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        $query->where('is_published',1);
    }
    public function scopeUnPublished($query)
    {
        $query->where('is_published', 0);
    }

}
