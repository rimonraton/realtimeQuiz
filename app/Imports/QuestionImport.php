<?php

namespace App\Imports;

use App\Category;
use App\Question;
use App\QuestionsOption;
use App\QuestionType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use function React\Promise\Stream\first;

class QuestionImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
//        dd($collection[1][1]);
        $topic = '';
//        $qt ='';
//        dd($topic);
        $admin = auth()->user()->admin;
        $admin_users = $admin->users()->pluck('id');
        foreach ($collection as $k=>$row)
        {
            if($k==0){
                continue;
            }
          $tdata = Category::where('name',$row[1])->whereIn('user_id',$admin_users)->first();
//            $qt = QuestionType::whereIn('user_id',$admin_users)->first();
            if ($tdata){
                $topic = $tdata->id;
            }else{
              $topic_id =  Category::create([
                    'name'=>$row[1]
                ])->id;
                $topic = $topic_id;
            }
//            dd($row[1]);

            $Qid =   Question::create([
                'user_id'=> auth()->user()->id,
                'question_text' => $row[0],
                'status'=>count($row),
                'category_id'=>$topic,
                'quizcategory_id'=>1,
            ]);
            $co = explode(" ",$row[7])[1];
//            dd($co);

            $value = 1;
         foreach (range(0,8) as $a){
             $correct = 0;
             if($a + 1 == $co){
                 $correct = 1;
             }
            if ($value + 1 <= count($row)){
                if ($value < 6){
                    if (!empty($row[$value + 1])){
                        QuestionsOption::create([
                            'option' => $row[$value + 1],
                            'correct'=>$correct,
                            'question_id' => $Qid->id,
                        ]);
                    }

                }
                else{
                    break;
                }
           }
             $value += 1;
         }

        }
    }
}
