<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','token','admin_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'gid');
    }

    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }
    // public function role()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
    public function roleuser()
    {
        return $this->hasOne(RoleUser::class);
    }
    public function usermenu()
    {
        return $this->hasOne(MenuRole::class,'user_id','id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function challange()
    {
        return $this->hasMany('App\Models\Challenge');
    }

}
