<?php

namespace App\Imports;

use App\Question;
use App\QuestionsOption;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuestionImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
//        dd($collection[1][1]);
        foreach ($collection as $k=>$row)
        {
            if($k==0){
                continue;
            }
         $Qid =   Question::create([
                'user_id'=> auth()->user()->id,
                'question_text' => $row[0],
                'status'=>count($row),
                'category_id'=>$row[1],
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
