<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Models\Friend\Friend;
use App\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

    public function index()
    {
//      $friends_to_id = auth()->user()->friendsTo->pluck('pivot.id');
//      $friends_from_id = auth()->user()->friendsFrom->pluck('pivot.id');
//      return $friends = User::find(auth()->id())->load('friendsTo:id', 'friendsFrom:id');
//      return $friends->friendsTo->pluck('pivot.id');
//
//      $friends = Friend::with('user:id,name,email')->where('user_id', auth()->id());
//      $friends_id = $friends->pluck('id');
//
//      $friends->paginate(10);
       $users = User::query()
        ->with(['friendsFrom' => function ($query) {
          return $query->where('friends.user_id', auth()->id());
        }, 'friendsTo' => function ($query) {
          return $query->where('friends.friend_id', auth()->id());
        },])
        ->orderBy('name')->paginate(10);
      return view('Admin.Friends.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friend\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
