<?php

namespace App;

use App\Models\Friend\Friend;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    public $isApp=0;

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
     public function roles()
     {
         return $this->belongsToMany(Role::class);
     }
    public function hasRole($roleName)
    {
      return $this->roles()->where('role_name', $roleName)->exists();
    }
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

  public function friendsTo() {
    return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
      ->withPivot('id','status')
      ->withTimestamps();
  }

  public function friendsFrom() {
    return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
      ->withPivot('id','status')
      ->withTimestamps();
  }


}
