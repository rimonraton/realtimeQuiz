<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $guarded = [];
    // protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'topic_id', 'course_id', 'exam_id'];
    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class, 'level', 'id');
    }
    public function level()
    {
        return $this->hasMany(Difficulty::class, 'id', 'level');
    }
    public function options()
    {
        return $this->hasMany(QuestionsOption::class)->inRandomOrder();
    }

    public function category()
    {
        return $this->belongsTo(QuizCategory::class,'quizcategory_id');
    }
    public function role(){
        return $this->belongsTo(RoleUser::class,'user_id','user_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
