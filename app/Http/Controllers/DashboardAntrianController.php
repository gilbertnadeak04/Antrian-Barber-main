<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAntrianController extends Controller
{
    public function indexHairCut()
    {
        return view('dashboard.antrian.hairCut');
    }

    public function indexGoodLook()
    {
        return view('dashboard.antrian.goodLook');
    }

    public function indexGoodMood()
    {
        return view('dashboard.antrian.goodMood');
    }

    public function indexHairEnjoy()
    {
        return view('dashboard.antrian.hairEnjoy');
    }
}
