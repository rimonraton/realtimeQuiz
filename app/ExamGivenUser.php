<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamGivenUser extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
