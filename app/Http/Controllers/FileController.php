<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
  {
    $menus = \App\Menu::where('show_menu', 1)->with('childs')->paginate(10);
    $parent_menus = \App\Menu::where('show_menu', 1)->get();
    return view('Admin.Files.index', compact('menus', 'parent_menus'));
  }
    public function store(Request $request)
    {
        $filePath = '';
        if ($request->hasFile('file')) {
            $original_name = $request->file('file')->getClientOriginalName();
            $ext = strtolower(\File::extension($original_name));
            $created_at = Carbon::now('Asia/Dhaka');
            $t = $created_at->timestamp;
            $r = Str::random(40);
            $random_name = $t . '' . $r . '.' . $ext;
            $path = public_path() . '/' . 'temp/';
            $filename = $random_name;
            $request->file('file')->move($path, $filename);
            $filePath = $filename;
        }
        return $filePath;
    }

    public function deleteFile($path)
    {
//        return public_path().'temp/'.$path;
        if(\File::exists(public_path('temp/'.$path))){
            \File::delete(public_path('temp/'.$path));
            return "Success";
        }
            dd('File does not exists.');

    }
}
