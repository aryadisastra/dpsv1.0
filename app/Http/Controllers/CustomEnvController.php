<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomEnvController extends Controller
{
    public function moveMobilImage($imageFile = null, $imageName = null)
    {
        if ($imageFile && $imageName) {
            $path = public_path() . '/img/mobil';
            $uploadimages = $imageFile->move($path, $imageName);
            if ($uploadimages) {
                return 'success';
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function loadMobilImage($image_file)
    {
        return public_path() .  '/img/mobil/'  . $image_file;
    }
}
