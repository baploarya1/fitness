<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
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
    return redirect('/dashboard');
});

Route::middleware('auth')->group(
    function () {
        // home
        Route::resource('dashboard', HomeController::class);
        Route::resource('/member', MemberController::class);
        Route::resource('/paket', PaketController::class);
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/members', [MemberController::class, 'index']);
        Route::get('/pakets', [PaketController::class, 'index']);
        Route::get('/cetak-pembayaran/{id}', [TransaksiController::class, 'cetakPembayaran']);
        Route::post('/hapus-member', [MemberController::class,'hapusMember']);
        Route::post('/hapus-transaksi', [TransaksiController::class,'hapusTransaksi']);
        Route::post('/hapus-paket', [PaketController::class,'hapusPaket']);
        // Route::post('/transaksi', [TransaksiController::class,'store']);
        Route::post('/ajax-load-paket', [TransaksiController::class, 'ajaxLoadPaket'])->name('ajax.load.paket');
    }
);

Route::get('/login', [LoginController::class, 'index'])->name( 'login')->middleware('guest') ;
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth');
 
// Route::get('/laporan-penjualan', [LaporanController::class, 'getLaporanPenjualan'])->middleware('auth');
// Route::get('/laporan-pembelian', [LaporanController::class, 'getLaporanPembelian'])->middleware('auth');
 
// Route::post('/cetak-penjualan', [LaporanController::class, 'cetakPenjualan'])->middleware('auth');
// Route::post('/cetak-pembelian', [LaporanController::class, 'cetakPembelian'])->middleware('auth');
// Route::post('/cetak-pembelian-excel', [LaporanController::class, 'exportExcelPembelian'])->middleware('auth');
// Route::post('/cetak-penjualan-excel', [LaporanController::class, 'exportExcelPenjualan'])->middleware('auth');
 





