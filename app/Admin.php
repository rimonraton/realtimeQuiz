<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = [];
    public function users(){
        return $this->hasMany(User::class);
    }
    public function userinfo(){
        return $this->hasOne(UserInfo::class,'user_id','user_id');
    }
}
