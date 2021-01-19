<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function perform_messages()
    {
        return $this->hasMany(PerformMessage::class);
    }
}
