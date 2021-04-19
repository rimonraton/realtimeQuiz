<?php

use Illuminate\Support\Facades\Route;


Route::get('admintest', function (){
   return 'Admin tests';
});
Route::get('webrtcReceiver', function (){
    return view('webrtc.receiver');
});
Route::get('webrtcSender', function (){
    return view('webrtc.sender');
});
Route::get('webrtctest', function(){
    return view('webrtc.index');
});

