<?php

namespace App\Models;

use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public function share()
    {
        return $this->hasMany(Share::class);
    }
    public function getCategoryAttribute()
    {
        if (!$this->relationLoaded('category')) {
            $category = Category::select('id', 'name', 'bn_name')->whereIn('id', explode(',', $this->cat_id))->get();

            $this->setRelation('category', $category);
        }

        return $this->getRelation('category');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

}
