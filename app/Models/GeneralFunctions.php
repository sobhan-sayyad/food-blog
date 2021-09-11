<?php

namespace App\Models;

use Illuminate\Http\Request;

class GeneralFunctions
{
    public static function upload(Request $request){
        $path = $request->file('image')->store('public');
        return $path;
    }
}
