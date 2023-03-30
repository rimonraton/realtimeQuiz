<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareQuestion extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->belongsTo(Question::class, 'question_id' );
    }

    public function shareFromUserData()
    {
        return $this->belongsTo(User::class, 'shareFromUser');
     }

    public function user()
    {
        return $this->belongsTo(User::class, 'shareToUser');
     }
}
