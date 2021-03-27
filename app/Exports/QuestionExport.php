<?php

namespace App\Exports;

use App\Category;
use App\Question;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class QuestionExport implements FromCollection,ShouldAutoSize,WithMapping,WithHeadings,WithEvents,WithStrictNullComparison
{
    protected $results;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

//        $admin = auth()->user()->admin;
//        $admin_users = $admin->users()->pluck('id');
//        $this->results = Question::whereIn('user_id',$admin_users)->get();
//        dd($results);
       return $this->results = Category::all();
    }
    public function map($question): array
    {
        return [


        ];
    }
    public function headings(): array
    {
        return [
            'Question',
            'Topic',
            'Option 1',
            'Option 2',
            'Option 3',
            'Option 4',
            'Option 5',
            'Correct Option'
        ];
    }


    public function registerEvents(): array
    {
//        $admin = auth()->user()->admin;
//        $admin_users = $admin->users()->pluck('id');
        return [
            // handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {

                // get layout counts (add 1 to rows for heading row)
//                $row_count = $this->results->count() + 1;
//                $column_count = count($this->results[0]->toArray());

                // set dropdown column
                $drop_column = 'B';
                $correct = 'H';
                // set dropdown options
//                dd(Category::pluck('name')->toArray());
                $topics = Category::whereIn('user_id',auth()->user()->admin->users()->pluck('id'))->where('sub_topic_id',0)->pluck('name')->toArray();
//                $topics = [
//                    'General Knowledge',
//                    'Sports',
//                    'Arts & Literature',
//                    'Culture & Life Style',
//                    'Life Science',
//                    'Science',
//                    'Maths',
//                    'Geography',
//                    'History',
//                    'Mixed',
//                    'BCS',
//                    'Bangladesh affairs',
//                    'International affairs',
//                    'Bangla Literature',
//                    '10th BCS',
//                    '11th BCS',
//                    '12th BCS',
//                    '13th BCS',
//                    '14th BCS',
//                    '15th BCS',
//                    '16th BCS',
//                    '17th BCS',
//                    '18th BCS',
//                    '19th BCS',
//                    '20th BCS',
//                    '21st BCS',
//                    '22nd BCS',
//                    '23rd BCS',
//                    '24th BCS',
//                    '25th BCS',
//                    '26th BCS',
//                    '27th BCS',
//                    '28th BCS',
//                    '29th BCS',
//                    '30th BCS',
//                    '31st BCS',
//                    '32nd BCS',
//                    '33rd BCS',
//                    '34th BCS',
//                    '35th BCS',
//                    'ICT',
//                ];
                $options = [
                    'Option 1',
                    'Option 2',
                    'Option 3',
                    'Option 4',
                    'Option 5',
                ];

                // set dropdown list for first data row
                $validation = $event->sheet->getCell("{$drop_column}2")->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST );
                $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Value is not in list.');
                $validation->setPromptTitle('Topics');
                $validation->setPrompt('Please Select Topic');
                $validation->setFormula1(sprintf('"%s"',implode(',',$topics)));

                // set dropdown list for first data row
                $validation = $event->sheet->getCell("{$correct}2")->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST );
                $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Value is not in list.');
                $validation->setPromptTitle('Answer');
                $validation->setPrompt('Please Select Correct Option');
                $validation->setFormula1(sprintf('"%s"',implode(',',$options)));

                // clone validation to remaining rows
//                for ($i = 3; $i <= $row_count; $i++) {
//                    $event->sheet->getCell("{$drop_column}{$i}")->setDataValidation(clone $validation);
//                }
//                for ($i = 3; $i <= $row_count; $i++) {
//                    $event->sheet->getCell("{$correct}{$i}")->setDataValidation(clone $validation);
//                }

                // set columns to autosize
//                for ($i = 1; $i <= $column_count; $i++) {
//                    $column = Coordinate::stringFromColumnIndex($i);
//                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
//                }
            },
        ];
    }
}
