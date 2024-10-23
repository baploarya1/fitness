<?php

namespace App\Http\Controllers;

use App\Models\Aksesoris;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class LaporanController extends Controller
{
    //
    public function indexMutasi(){
         $aksesoris = Aksesoris::select("kode_aksesoris","nama_aksesoris",'satuan' )->where('type', '!=', 'z')->get();

        return view('laporan.mutasi',compact('aksesoris'));

    }
    public function cetakMutasi(Request $request)
    {
          
        // dd($request->all());
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $kode_aksesoris = $request->input('kode_aksesoris');

        $query = Mutasi::query();
        
        if ($kode_aksesoris) {
            $query->where('kode_aksesoris', $request->input('kode_aksesoris')  );
        }
   
         if ($tgl_awal) {
            $query->whereDate('tanggal_transaksi', '>=', $tgl_awal);
         }
   
         if ($tgl_akhir) {
            $query->whereDate('tanggal_transaksi', '<=',   $tgl_akhir);
         }
        $mutasiStok = $query->with('barang')->where('mutasi.type', 'a')->get()->groupBy('kode_aksesoris');

        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('L');

        // Load the view content
        $html = view('laporan.cetak_mutasi',compact('mutasiStok','tgl_awal','tgl_akhir'))->render();

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);

        // Output the PDF as a download
        $mpdf->Output();
    }
}
