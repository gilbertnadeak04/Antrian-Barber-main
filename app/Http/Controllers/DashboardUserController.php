<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DashboardUserController extends Controller
{
    public $tanggal_antrian;
    public function index()
    {
        $user = User::where('role_id', 2)->get();

        
        return view('dashboard.user.index',['user' => $user]);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

}
