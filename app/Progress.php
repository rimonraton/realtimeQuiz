<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
	// protected $table ='progresses';
	protected $guarded = [];

	public function perform()
	{
		return $this->belongsTo(PerformMessage::class, 'perform_message_id');
	}
}
