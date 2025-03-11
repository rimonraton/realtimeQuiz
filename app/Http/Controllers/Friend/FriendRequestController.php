<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Models\Friend\Friend;
use App\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
  public function sendRequest(Request $request)
  {
    $friendRequest = new Friend();
    $friendRequest->user_id = auth()->id();
    $friendRequest->friend_id = $request->receiver_id;
    $friendRequest->status = 'pending';
    try {
      $friendRequest->save();
    }catch (\Exception $exp){
      return ['status' =>'error', 'msg' => "Friend Request already sent! Wait for accepting"];
  }
    return ['status' =>'success', 'msg' => 'Friend Request sent!'];
  }

  public function acceptRequest(Friend $friend)
  {
    $friend->status = 'accepted';
    $friend->save();
    return session('success', 'Friend request accepted!');
  }

  public function cancelRequest(Friend $friend)
  {
    if(auth()->id() == $friend->user_id || auth()->id() == $friend->friend_id){
      $friend->delete();
      return session('success','Friend request canceled.');
    }
    return ['error' =>'403 Request rejected'];
  }

  public function rejectRequest($id): \Illuminate\Http\RedirectResponse
  {
    $friendRequest = Friend::find($id);
    $friendRequest->status = 'rejected';
    $friendRequest->save();

    return back()->with('success', 'Friend request rejected.');
  }


}
