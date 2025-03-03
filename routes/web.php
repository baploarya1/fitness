<?php

use App\Http\Controllers\AksesorisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Pembelian;
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
        Route::resource('/pembayaran', PembayaranController::class);
        Route::resource('/pembelian', PembelianController::class);
        Route::resource('/penjualan', PenjualanController::class);
        Route::resource('/aksesoris', AksesorisController::class);
        Route::resource('/supplier', SupplierController::class);
        Route::get('/members', [MemberController::class, 'index']);
        Route::get('/pakets', [PaketController::class, 'index']);
        Route::get('/cetak-pembayaran/{id}', [TransaksiController::class, 'cetakPembayaran']);
        Route::post('/hapus-member', [MemberController::class,'hapusMember']);
        Route::post('/hapus-transaksi', [TransaksiController::class,'hapusTransaksi']);
        Route::post('/hapus-paket', [PaketController::class,'hapusPaket']);
        Route::post('/hapus-pembayaran', [PembayaranController::class,'hapusPembayaran']);
        Route::post('/hapus-aksesoris', [AksesorisController::class,'hapusAksesoris']);
        Route::post('/hapus-pembelian', [PembelianController::class,'hapusPembelian']);
        Route::post('/hapus-penjualan', [PenjualanController::class,'hapusPenjualan']);
        Route::post('/hapus-supplier', [SupplierController::class,'hapusSupplier']);
        Route::post('/cetak-mutasi', [LaporanController::class,'cetakMutasi']);
        Route::post('/cetak-saldo-stok', [LaporanController::class,'cetakSaldoStok']);
        Route::get('/laporan-mutasi', [LaporanController::class,'indexMutasi']);
        Route::get('/laporan-application-form', [LaporanController::class,'indexApplicationForm']);
        Route::get('/laporan-saldo-stok', [LaporanController::class,'indexSaldoStok']);
        Route::post('/cetak-application-form', [LaporanController::class,'cetakApplicationForm']);
        Route::resource('user', UserController::class);
        Route::post('/hapus-user', [UserController::class,'hapusUser']);

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
 





