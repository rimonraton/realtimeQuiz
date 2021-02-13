<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    public function childs()
    {
        return $this->hasMany(Menu::class,'parent_id','id');
    }
}
