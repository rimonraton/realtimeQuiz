<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = [];
    public function users(){
        return $this->hasMany(User::class);
    }
}
