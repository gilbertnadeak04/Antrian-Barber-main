<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $hairCut   = Antrian::where('paket', 'cut')->where('is_call', false)->count();
        $goodLook   = Antrian::where('paket', 'look')->where('is_call', false)->count();
        $goodMood    = Antrian::where('paket', 'mood')->where('is_call', false)->count();
        $hairEnjoy  = Antrian::where('paket', 'enjoy')->where('is_call', false)->count();

        $currentMonth = Carbon::now()->month;
    
        $hairCuts   = Antrian::where('paket', 'cut')->whereMonth('created_at', $currentMonth)->where('is_call', true)->count();
        $goodLooks   = Antrian::where('paket', 'look')->whereMonth('created_at', $currentMonth)->where('is_call', true)->count();
        $goodMoods    = Antrian::where('paket', 'mood')->whereMonth('created_at', $currentMonth)->where('is_call', true)->count();
        $hairEnjoys  = Antrian::where('paket', 'enjoy')->whereMonth('created_at', $currentMonth)->where('is_call', true)->count();
                
        $currentWeek = Carbon::now()->weekOfYear;
    
        $hairCutss   = Antrian::where('paket', 'cut')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', true)->count();
        $goodLookss   = Antrian::where('paket', 'look')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', true)->count();
        $goodMoodss    = Antrian::where('paket', 'mood')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', true)->count();
        $hairEnjoyss  = Antrian::where('paket', 'enjoy')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', true)->count();
        

        return view('dashboard.index', [
            'hairCut'      => $hairCut,
            'goodLook'      => $goodLook,
            'goodMood'       => $goodMood,
            'hairEnjoy'    => $hairEnjoy,
            'hairCuts'      => $hairCuts,
            'goodLooks'      => $goodLooks,
            'goodMoods'       => $goodMoods,
            'hairEnjoys'    => $hairEnjoys,
            'hairCutss'      => $hairCutss,
            'goodLookss'      => $goodLookss,
            'goodMoodss'       => $goodMoodss,
            'hairEnjoyss'    => $hairEnjoyss
        ]);
    }
}
