<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'topic_id', 'course_id', 'exam_id'];
    
    public function options()
    {
        return $this->hasMany(QuestionsOption::class);
    }
}
