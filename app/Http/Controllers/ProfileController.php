<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Victorybiz\GeoIPLocation\GeoIPLocation;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //    return $userInfo = Auth::user()->info;
        $geoip = new GeoIPLocation();
        $geoip->setIP('27.147.187.184');
        // dd($geoip);

        // $country = strtolower($geoip->getCountryCode());

        $userInfo = User::with('info')->where('id', Auth::user()->id)->first();
        return view('Admin.PartialPages.Profile.profile', compact(['userInfo', 'geoip']));
    }
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        // return $request->uid;
        // return $request->all();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $location = 'images/profile/';
        // $imgPath = '';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $original_name = $file->getClientOriginalName();
            $ext = strtolower(\File::extension($original_name));
            $created_at = Carbon::now('Asia/Dhaka');
            $t = $created_at->timestamp;
            $r = Str::random(40);
            $random_name = $t . '' . $r . '.' . $ext;
            $path = public_path() . '/' . $location;
            $filename = $location . $random_name;
            $file->move($path, $filename);
            $data['avatar'] = $filename;
        }
        UserInfo::where('user_id', $id)->update([
            "about" => $request->about,
            "mobile" => $request->mobile,
            "slogan" => $request->slogan,
        ]);
        // if ($request->password) {
        //     $pass = Hash::make($request->password);
        // }
        if ($request->password) {
            $newpass = bcrypt($request->password);
            User::where('id', $id)->update(['password' => $newpass]);
        }
        User::where('id', $id)->update($data);
        return redirect('profile');
    }
}
