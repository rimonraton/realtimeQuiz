<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
