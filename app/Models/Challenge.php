<?php

namespace App\Models;

use App\Category;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
