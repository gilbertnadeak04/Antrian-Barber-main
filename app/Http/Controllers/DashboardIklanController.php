<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardIklanController extends Controller
{
    public $tanggal_antrian;

    public function index()
    {
        $iklans = Iklan::where('status', 'pending')->get();
        return view('dashboard.iklan.index', ['iklans' => $iklans]);
    }

    public function indexApproved()
    {
        $iklans = Iklan::where('status', 'approved')->get();
        return view('dashboard.iklan.approved', ['iklans' => $iklans]);
    }

    public function approveIklan($id)
    {
       Iklan::where('id', $id)->update([
           'status' => 'approved',
       ]);
       return redirect()->back()->with('success', 'Iklan berhasil di approve');
    }

    public function destroy($id)
    {
        Iklan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Iklan berhasil di hapus');
    }
}