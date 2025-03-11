<?php

namespace App\Models\Friend;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
  public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
