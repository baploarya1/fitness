<?php

namespace App\Http\Controllers;

use App\Models\Aksesoris;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Mutasi;
use App\Models\Paket;
use App\Models\Pembayaran;
use App\Models\Transaksi;
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
    public function indexApplicationForm(){
        $members = Member::select("nomor_member","nama_member","alamat")->where('type', '!=', 'z')->get();
        $kategoris = Kategori::select("kode_kategori","nama_kategori")->where('type', '!=', 'z')->get();
        $pakets = Paket::select("kode_paket","nama_paket")->where('type', '!=', 'z')->get();
        $pembayarans = Pembayaran::select("kode_pembayaran","nama_pembayaran")->where('type', '!=', 'z')->get();
        return view('laporan.applicationForm',compact('members','pakets','kategoris','pembayarans'));

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
    public function cetakApplicationForm(Request $request)
    {
          
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $nama_member = $request->input('nama_member');
        $nomor_member = $request->input('nomor_member');
        // dd($nomor_member." ". $nama_member);

        $query = Transaksi::with('member')->join('member', 'transaksi.nomor_member', '=', 'member.nomor_member')
        ->with('paket')->with('kategori');
        
       
        if ($nomor_member) {
            $query->where('nomor_member', $request->input('nomor_member'));
        }
        if ($nama_member) {
            // $query->whereHas('member', function($query) use ($request) {
            //     $query->where('nama_member', $request->input('nama_member'));
            // });
            $query->where('nama_member', (string)$request->input('nama_member'));
        }
        if ($tgl_awal) {
            $query->whereDate('tanggal_transaksi', '>=', $tgl_awal);
        }
   
        if ($tgl_akhir) {
            $query->whereDate('tanggal_transaksi', '<=',   $tgl_akhir);
        }
        
        $transaksis = $query->where('transaksi.type', 'a')->get() ;
        // dd($transaksis->toSql(), $transaksis->getBindings());
 
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('L');

        // Load the view content
        $html = view('laporan.cetakApplicationForm',compact('transaksis','tgl_awal','tgl_akhir'))->render();

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);

        // Output the PDF as a download
        $mpdf->Output();
    }
}
