<?php

namespace App\Http\Controllers;

use App\File;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LaravelFileViewer;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
  {
    $isSuperAdmin = auth()->user()->hasRole('Super Admin');
    $isAdmin = auth()->user()->hasRole('Admin');
    $isUser = !$isSuperAdmin && !$isAdmin;

    $files = File::with('user:id,name')
      ->when(!$isSuperAdmin, function ($query) {
        return $query->where('admin_id', auth()->user()->admin->id);
      })
      ->when($isUser, function ($query) {
        return $query->where('status', 1);
      })
      ->latest()
      ->paginate(10);

    return view('Admin.Files.index', compact('files'));
  }
  public function create()
  {

  }
  public function store(Request $request)
  {
    if($request->has('removedFile')){
      File::where('path', $request->input('removedFile'))->delete();
      return 'File removed';
    }
    $request->merge([
      'user_id' => auth()->id(),
      'admin_id' => auth()->user()->admin->id
    ]);
    $file = File::create($request->except(['success', 'error']));
    return $file;
  }

  /**
   * @throws AuthorizationException
   */
  public function show(File $file) {
    $this->authorize('view', $file);
    $filename = $file->name;
    $filepath= $file->path;
    $file_url= asset(Storage::url($filepath));
//    dd(Storage::exists($file_url));
    $file_data=[
      [
        'label' => __('File'),
        'value' => "N/A"
      ]
    ];
    return LaravelFileViewer::show($filename,$filepath,$file_url,$file_data);
  }

  public function edit()
  {

  }
  public function update(Request $request, File $file)
  {
    $file->title = $request->title;
    $file->status = $request->published == 'on' ? 1:0;
    $file->save();
    session()->flash('success', 'File updated successfully!');
    return redirect()->back();
  }

  public function Delete(File $file)
  {
    if(Storage::exists($file->path)){
      Storage::delete($file->path);
    };
    $file->delete();
    return 'File removed';

  }

  public function published(File $file, $state)
  {
    $file->status = $state;
    $file->save();
    return $file;
  }

  public function Preview() {
      return view('Admin.files.viewer');
  }



  public function destroy($path)
  {
//        return public_path().'temp/'.$path;
      if(\File::exists(public_path('temp/'.$path))){
        \File::delete(public_path('temp/'.$path));
          return "Success";
      }
          dd('File does not exists.');

  }
}
