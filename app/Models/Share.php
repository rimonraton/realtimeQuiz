<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $guarded =[];
    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
