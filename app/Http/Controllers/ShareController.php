<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\Models\Challenge;
use App\Models\Share;
use App\TeamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShareController extends Controller
{
    public function challengeResult(Request $request)
    {
//        return $request->all();
        if($request->share_id) {
            $share = Share::find($request->share_id);
            $share->results = json_encode($request->result);
            $share->save();
        }

        $gc = new GameController();

        if($request->host_end) {
            $gc->gameEndByHost($request);
        }else {
            $gc->gameEndUser($request);
        }
        return 'success';
    }
    public function challengeShare($link)
    {
       // $this->challengeShareResult($link);
        return view('result_share', compact('link'));
    }

    public function challengeShareResultDetails($link)
    {

        $share = Share::where('link', $link)->first();
        $challenge = Challenge::findOrFail($share->challenge_id);

        $categories = Category::whereIn('id', explode(",", $challenge->cat_id))->get();
        $results = collect(json_decode($share->results));
        //$sr = $sr->keyBy('id')->sortByDesc('score');
        $features = Game::with('features')->get();
        $category = Category::where('sub_topic_id', 0)->get();
        return view('result_share', compact('results','link', 'challenge', 'categories', 'features', 'category'));
        return view('result_share_details', compact('results','link', 'challenge', 'categories', 'features', 'category'));
    }
    public function challengeShareResult($link)
    {
        $share = Share::where('link', $link)->first();
        $sr = collect(json_decode($share->results));
        $sr = $sr->keyBy('id')->sortByDesc('score');
        $users = collect(json_decode($share->users));
        //dd($users);
        //$users = \App\User::whereIn('id', explode(',',$share->users_id))->get();
        $pp = public_path('img/');

        $result = \Image::make($pp.'result.jpg');

        $resultFont = public_path('/fonts/result.ttf');
        $rt = '/'. $share->challenge->quantity * 100;
        $otheruser = 2;
//        return $users;
        foreach ($users as $key => $user){
            $s = $key >1 ? 50 : 90;
            if($key >2){break;}
            $avatar = $user->avatar != ''|| $user->avatar != null ? $user->avatar : $pp.'avatar.png';
//            if ($key==1){
//                return $avatar;
//            }
            $temp = $this->rounded($avatar, $link, $s);
            $user_image = \Image::make($temp);
            $flag = \Image::make('https://flagcdn.com/40x30/'.$user->country.'.png');
            if(\File::exists($temp)){ \File::delete($temp); }
            $name = $sr->get($user->id)->name;
            $score = $sr->get($user->id)->score .$rt;

            if($key == 0){
                $result->insert($user_image, 'top-left', 40, 27);
                $result->text($name, 85, 125, function($font) use($resultFont) {
                    $font->file($resultFont);
                    $font->size(18);
                    $font->color('#fdf6e3');
                    $font->align('center');
                    $font->valign('top');
                });
                $result->insert($flag, 'top-left', 140, 50);
                $result->text($score, 90, 150, function($font) use($resultFont) {
                    $font->file($resultFont);
                    $font->size(30);
                    $font->color('#fdf6e3');
                    $font->align('center');
                    $font->valign('top');
                });
            }
            if($key == 1){
                $result->insert($user_image, 'top-right', 36, 27);
                $result->text($name, 570, 125, function($font) use($resultFont) {
                    $font->file($resultFont);
                    $font->size(18);
                    $font->color('#fdf6e3');
                    $font->align('center');
                    $font->valign('top');
                });
                $result->insert($flag, 'top-right', 135, 50);
                $result->text($score, 570, 150, function($font) use($resultFont) {
                    $font->file($resultFont);
                    $font->size(30);
                    $font->color('#fdf6e3');
                    $font->align('center');
                    $font->valign('top');
                });
            }
            if($key == 2){
                $result->insert($user_image, 'bottom', 70,75);
                $result->text($name, 330, 280, function($font) use($resultFont) {
                    $font->file($resultFont);
                    $font->size(18);
                    $font->color('#fdf6e3');
                    $font->align('center');
                    $font->valign('top');
                });
                $result->insert($flag, 'bottom-right', 250, 75);
                $result->text($score, 330, 300, function($font) use($resultFont) {
                    $font->file($resultFont);
                    $font->size(25);
                    $font->color('#fdf6e3');
                    $font->align('center');
                    $font->valign('top');
                });
            }

            if($key >2){
                $result->insert($user_image, 'bottom-left', $otheruser, 2);
                $otheruser +=55;
            }

        }

        //$result->save($pp.'temp/'.$link.'.png');
        header('Content-Type: image/png');
        return $result->response('png');
    }

    public function rounded($file, $name, $s = 90)
    {
//        return $file;
        $image_s = imagecreatefromstring(file_get_contents($file));
        $width = imagesx($image_s);
        $height = imagesy($image_s);
        $newwidth = $s;
        $newheight = $s;
        $image = imagecreatetruecolor($newwidth, $newheight);
        imagealphablending($image, true);
        imagecopyresampled($image, $image_s, 0,0,0,0, $newwidth, $newheight, $width, $height);
        $mask = imagecreatetruecolor($newwidth, $newheight);
        $transparent = imagecolorallocate($mask, 255,0,0);
        imagecolortransparent($mask, $transparent);
        imagefilledellipse($mask, $newwidth/2, $newheight/2, $newwidth, $newheight, $transparent);
        $red = imagecolorallocate($mask, 0,0,0);
        imagecopymerge($image, $mask, 0,0,0,0, $newwidth, $newheight, 100);
        imagecolortransparent($image, $red);
        imagefill($image, 0,0,$red);
        // header('Content-type:image/png');
        $output = public_path('img/temp/'.$name.'.png');
        imagepng($image, $output);
        imagedestroy($image);
        imagedestroy($mask);

        return $output;

    }

    public function makeQuizImage()
    {
        $pp = public_path('img/quiz/');


        $gk = \Image::make($pp.'gk.jpg');
        $sp = \Image::make($pp.'sp.jpg');
        $al = \Image::make($pp.'al.jpg');

        $gk->resize(100, null);
        $sp->resize(100, null);
        $al->resize(100, null);

        $img_canvas = \Image::canvas(300, 200);
        $img_canvas->insert($al, 'left');
        $img_canvas->insert($sp, 'right');
        $img_canvas->insert($gk, 'center');
        $img_canvas->save($pp.'ags'.'.jpg');

//        $img_canvas->insert($al, 'right');
        header('Content-Type: image/png');
        return $img_canvas->response('png');
    }

    public function challengeUserResultList()
    {
        $uid = Auth::id();
        $results = Share::where(function($q) use ($uid) { $q->whereRaw("FIND_IN_SET($uid,users_id)"); })->orderBy('id','DESC')->paginate(10);
//        return $users = collect(json_decode($results[0]->users));
        return view('Admin.Games.resultList', compact('results'));
    }

    public function deleteResult($id)
    {
        Share::where('id',$id)->delete();
        return 'success';
    }

    public function teamResultList()
    {
        $uid = Auth::id();
        $results = TeamResult::orderBy('id','DESC')->paginate(10);
//         collect(json_decode($results->results));
//       return collect(json_decode($results->results));
        return view('Admin.Games.teamresultList', compact('results'));
    }

    public function teamAnswertList($id,$team)
    {
        $all_answers='';
        $teamresults = TeamResult::find($id);
       $results = collect(json_decode($teamresults->results));
       foreach ($results as $result){
           if($result->name == $team){
               $all_answers = $result->answers;
           }
       }
//       return $all_answers;
       return view('Admin.Games.answer',compact('all_answers'));

    }
}
