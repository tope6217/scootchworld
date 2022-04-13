<?php

namespace App;

use Illuminate\Support\Facades\File;

use Illuminate\Database\Eloquent\Model;
use App\role;

/**
 *
 */
trait responses
{
    public function user_role()
    {
        return role::where('role_name', 'user')->first()->id;
    }


    public function files($file, $location)
    {
        //return ($file);
        $fileName = time() . '.' . $file->extension();
        if ($file->move(public_path($location), $fileName)) {
            return ['status' => true, "location" => url($location . '/' . $fileName)];
        } else {
            return ['status' => false, "location" => url($location . '/' . $fileName)];
        };
    }

    public function delecteFile($location)
    {
        $based_url = url('/');
        $directory = trim(str_replace($based_url, '', $location));
        if (File::exists($directory)) {
            File::delete($directory);
            return true;
        }
        return false;
    }
}
