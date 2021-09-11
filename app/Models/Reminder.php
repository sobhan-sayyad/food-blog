<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public static function findReminderBycode($code){
        return Reminder::where('code',$code)->get();
    }
}
