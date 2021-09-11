<?php

namespace App\Http\Controllers;

class AdminPagesController extends Controller
{
    public function dashboard(){
        $dailySales = 150;
        $statics = 150;
        $salesAnalytics = 150;
        $totalRevenue = 150;
        return view('admin.dashboard',compact('dailySales','statics','salesAnalytics','totalRevenue'));
    }
}
