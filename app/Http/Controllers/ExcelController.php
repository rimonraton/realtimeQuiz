<?php

namespace App\Http\Controllers;

use App\Exports\QuestionExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Admin.PartialPages.Questions.partial.question_excel');
    }

    public function store(Request $request)
    {
        \Excel::import(new \App\Imports\QuestionImport(), public_path('temp/'.$request->file_url));
        if(\File::exists(public_path('temp/'.$request->file_url))){
            \File::delete(public_path('temp/'.$request->file_url));
        }
        return redirect('question/list');
    }

    public function export()
    {
        return \Excel::download(new QuestionExport(), 'dami.xlsx');
    }
}
