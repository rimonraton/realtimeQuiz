<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShareController extends Controller
{
    public function challengeShare($link)
    {
        $this->challengeShareResult($link);
        return view('result_share', compact('link'));
    }
    public function challengeShareResult($link)
    {
        $challenge = \App\Challenge::where('share_link', $link)->first();
        $users = \App\User::whereIn('id', explode(',',$challenge->users))->get();
        $pp = public_path('img/');

        $result = \Image::make($pp.'result.jpg');

        foreach ($users as $key => $user){
            $temp = $this->rounded($user->avatar, $link);
            $user_image = \Image::make($temp);
            if(\File::exists($temp)){ \File::delete($temp); }
            if($key % 2 == 1){
                $result->insert($user_image, 'top-right', 36, 27);
            }else{
                $result->insert($user_image, 'top-left', 40, 27);
            }

        }

        $resultFont = public_path('/fonts/result.ttf');

        $result->text('9/10', 150, 250, function($font) use($resultFont) {
            $font->file($resultFont);
            $font->size(40);
            $font->color('#fdf6e3');
            $font->align('center');
            $font->valign('top');
        });
        $result->text('7/10', 500, 250, function($font) use($resultFont) {
            $font->file($resultFont);
            $font->size(40);
            $font->color('#fdf6e3');
            $font->align('center');
            $font->valign('top');
        });
        //$result->save($pp.'temp/'.$link.'.png');

        return $result->response('png');
    }

    public function rounded($file, $name)
    {
        $image_s = imagecreatefromstring(file_get_contents($file));
        $width = imagesx($image_s);
        $height = imagesy($image_s);
        $newwidth = 90;
        $newheight = 90;
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
}
