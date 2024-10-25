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
    public function indexSaldoStok(){
         $aksesoris = Aksesoris::select("kode_aksesoris","nama_aksesoris",'satuan' )->where('type', '!=', 'z')->get();

        return view('laporan.saldo_stok',compact('aksesoris'));

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
    public function cetakSaldoStok(Request $request)
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
 
        $saldoStok = $query->with('barang')->select('kode_aksesoris')
            ->selectRaw('SUM(CASE WHEN keterangan = "PEMBELIAN"  THEN qty_satuan_kecil ELSE 0 END) as total_masuk')
            ->selectRaw('SUM(CASE WHEN keterangan = "PENJUALAN" THEN qty_satuan_kecil ELSE 0 END) as total_keluar')
            ->groupBy('kode_aksesoris')
            ->where('mutasi.type', 'a')
            ->get();

            // dd($saldoStok);
        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('L');

        // Load the view content
        $html = view('laporan.cetak_saldo_stok',compact('saldoStok','tgl_awal','tgl_akhir'))->render();

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
        $kode_kategori = $request->input('kode_kategori');
        $kode_paket = $request->input('kode_paket');
        // dd($nomor_member." ". $nama_member);
        // dd($request->all());
        $query = Transaksi::query()
        ->where('transaksi.type', 'a')
        
        ->join('member', 'transaksi.nomor_member', '=', 'member.nomor_member');       
        // ->join('paket', 'transaksi.kode_paket', '=', 'paket.kode_paket');        
       
        if ($nomor_member) {
            $query->where('transaksi.nomor_member', $request->input('nomor_member'));
        }
        if ($kode_paket) {
            $query->where('transaksi.kode_paket', $request->input('kode_paket'));
        }
        if ($kode_kategori) {
            $query->where('transaksi.kode_kategori', $request->input('kode_kategori'));
        }
        if ($nama_member) {
            $query->where('member.nama_member', (string)$request->input('nama_member'));
        }
        if ($tgl_awal) {
            $query->whereDate('tanggal_transaksi', '>=', $tgl_awal);
        }
   
        if ($tgl_akhir) {
            $query->whereDate('tanggal_transaksi', '<=',   $tgl_akhir);
        }
        
        $transaksis = $query->with('member')->with('paket')->with('kategori')->where('transaksi.type', 'a') ->get() ;
        // dd($transaksis);
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
