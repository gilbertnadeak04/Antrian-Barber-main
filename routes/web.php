<?php

use App\Http\Controllers\DashboardAntrianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardIklanController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\FrontAntrianController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\RegiisterController;
use App\Models\Iklan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $iklans = Iklan::where('status', 'approved')->paginate(3);
    return view('home', ['iklans' => $iklans]);
});

Route::resource('antrian', FrontAntrianController::class);
Route::get('livewire/antrian/cetakAntrian', [FrontAntrianController::class, 'cetakAntrian'])->name('cetakAntrian');
Route::resource('iklan', IklanController::class);
Route::get('/menu', [IklanController::class, 'menu'])->name('menu');
Route::get('iklan/detail/{id}', function ($id) {
    $iklan = Iklan::where('id', $id)->first();
    $iklans = Iklan::where('status', 'approved')->get();
    return view('iklan.show', ['iklan' => $iklan, 'iklans' => $iklans,
    ]);
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'CheckRole:admin'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('redirectifauthenticated');
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::resource('/register', RegiisterController::class);
        Route::get('dashboard/antrian/hairCut', [DashboardAntrianController::class, 'indexHairCut']);
        Route::get('dashboard/antrian/goodLook', [DashboardAntrianController::class, 'indexGoodLook']);
        Route::get('dashboard/antrian/goodMood', [DashboardAntrianController::class, 'indexGoodMood']);
        Route::get('dashboard/antrian/hairEnjoy', [DashboardAntrianController::class, 'indexHairEnjoy']);

        Route::get('dashboard/laporan/index', [DashboardLaporanController::class, 'index']);
        Route::get('dashboard/iklan/index', [DashboardIklanController::class, 'index']);
        Route::delete('dashboard/iklan/{id}', [DashboardIklanController::class, 'destroy'])->name('dashboard-iklan.destroy');
        Route::get('dashboard/iklan/indexApproved', [DashboardIklanController::class, 'indexApproved'])->name('indexApproved');
        Route::put('approveIklan/{id}', [DashboardIklanController::class, 'approveIklan'])->name('approveIklan');
        Route::get('dashboard/user/index', [DashboardUserController::class, 'index']);
        Route::resource('user', DashboardUserController::class);
        Route::get('livewire/dashboard/laporan/cetakLaporan', [DashboardLaporanController::class, 'cetakLaporan'])->name('cetakLaporan');
    });
});
