<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Auth()->user()->roleuser->role;
        $user = User::find(Auth::user()->id);
        return view('Admin.PartialPages.Payment.payment', compact('user'));
    }
}
