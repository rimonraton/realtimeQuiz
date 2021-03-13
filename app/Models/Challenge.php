<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public function share()
    {
        return $this->hasMany(Share::class);
    }

}
