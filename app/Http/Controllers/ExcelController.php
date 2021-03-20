<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExcelController extends Controller
{
    public function index()
    {
        return view('Admin.PartialPages.Questions.partial.question_excel');
    }

    public function store(Request $request)
    {
        $imgPath='';
        if ($request->hasFile('file')) {
            $original_name = $request->file('file')->getClientOriginalName();
            $ext = strtolower(\File::extension($original_name));
            $created_at = Carbon::now('Asia/Dhaka');
            $t = $created_at->timestamp;
            $r = Str::random(40);
            $random_name = $t . '' . $r . '.' . $ext;
            $path = public_path() . '/' . 'excel_file/';
            $filename = "excel_file/" . $random_name;
            $request->file('file')->move($path, $filename);
            $imgPath = $filename;
        }
//        return public_path($imgPath);
//        return asset($imgPath);
        \Excel::import(new \App\Imports\QuestionImport(), public_path($imgPath));
        return redirect('question/list');
    }
}
