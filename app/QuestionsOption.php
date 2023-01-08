<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class QuestionsOption extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id')->withTrashed();
    }

}
