<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];
    protected $appends = ['time'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getTimeAttribute()
    {
        return $this->created_at->format('D h:i A');
    }
}
