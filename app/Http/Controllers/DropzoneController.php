<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DropzoneController extends Controller
{
  public function __construct()
  {
//    parent::__construct();
  }

  public function dropzone()
  {
    return view('Admin.Files.dropzone');
  }
  public function dropzoneUpload(Request $request)
  {
    $request->validate([ 'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,docx,xlsx,pptx,pdf,mp3,mp4', ]);

    if($request->hasFile('file')) {
      $file = $request->file('file');
      $extension = $file->getClientOriginalExtension();

      $path = $request->file('file')->store('files');
      $filename = basename($path);

      return response()->json([
        'success' => 'File uploaded successfully',
        'name' => $filename,
        'path' => $request->directory.'/'.$filename,
        'ext' => $extension,

      ]);

    }
    return response()->json(['error' => 'No files found for upload.']);

  }

  public function dropzoneRemove(Request $request)
  {
    $file = $request->filename;
    if(Storage::exists($file)) {
      Storage::delete($file);
      return response()->json([
        'success' => 'File removed successfully.',
        'removedFile' => $file,
      ]);
    } else {
      return response()->json(['error' => 'File does not exist.'], 404);
    }
  }
}
