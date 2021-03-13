<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rolemenu()
    {
        return $this->hasOne(MenuRole::class,'role_id','role_id');
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
