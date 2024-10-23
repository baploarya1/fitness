<?php

namespace App\Http\Controllers;

use App\Helpers\PurchaseHelper;
use App\Models\Aksesoris;
use App\Models\Member;
use App\Models\Mutasi;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penjualans = Penjualan::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->select('faktur', 'tanggal_penjualan')->distinct()
        ->paginate(10);
         return view('penjualan.index', compact('penjualans'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $members = Member::select("nomor_member","nama_member","alamat")->where('type', '!=', 'z')->get();

        $aksesoris = Aksesoris::select("kode_aksesoris","nama_aksesoris","satuan")->where('type', '!=', 'z')->get();

        return view('penjualan.create',[
            "aksesoris"=>$aksesoris,
            "members"=>$members,
            "penjualans"=>[],
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // return $request->input('param');
        try {
    
            $data = $request->input('items');
            $faktur = $request->input('param');
            
            // return $request;
            $kodePenjualan = PurchaseHelper::generatePurchaseCode("PNJ");
            // return $faktur == '-'?$kodePenjualan: $faktur;
             // Simpan data member ke database
            $user = Auth::user();
            // jika update
            if ($faktur !== '-') {
                Penjualan::where('faktur', $faktur)->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
                Mutasi::where('nomor_transaksi', $faktur)->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
            }
            
            foreach ($data as $key => $value) { 
                Penjualan::create([
                    'faktur' => $faktur == '-'?$kodePenjualan: $faktur,
                    'kode_barang' => $value['kode_aksesoris'],
                    'nomor_member' => $value['nomor_member'],
                    'nama_member' => $value['nama_member'],
                    'nama_barang' => $value['nama_barang'],
                    'satuan' => $value['satuan'],
                    'harga' => $value['harga'],
                    'sub_total' => $value['sub_total'],
                    'tanggal_penjualan' => date("Y-m-d"),
                    'qty_satuan_kecil' => $value['jumlah'],
                    'type' =>  "a",
                    'username' =>  $user->name,
                    'user_id' => $user->id,
                ]);
                
                Mutasi::create([
                    'nomor_transaksi' =>  $faktur == '-'?$kodePenjualan: $faktur ,
                    'kode_aksesoris' => $value['kode_aksesoris'],
                    'keterangan' => 'PENJUALAN',
                    'jenis' => 'KELUAR',
                    'satuan' => $value['satuan'],
                    'harga' => $value['harga'],
                    'tanggal_transaksi' => date("Y-m-d"),
                    'qty_satuan_kecil' => $value['jumlah'],
                    'type' =>  "a",
                    'username' =>  $user->name,
                    'user_id' => $user->id,
                ]);
                
            }
            
        } catch (\Exception  $e) {
                //throw $th;
                // \Log::error();
                return  $e->getMessage();

                // $errors = $e->validator->errors();
                //     dd($errors);exit;
        }

        return 'berhasil';
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($faktur)
    {
        //
        $members = Member::select("nomor_member","nama_member","alamat")->where('type', '!=', 'z')->get();
        $aksesoris = Aksesoris::select("kode_aksesoris","nama_aksesoris","satuan")->where('type', '!=', 'z')->get();
        $penjualans = Penjualan::select('kode_barang as kode_aksesoris','nama_barang','nomor_member','nama_member','tanggal_penjualan','faktur','harga','sub_total','satuan','qty_satuan_kecil AS jumlah')->where('faktur', $faktur)->where('type', '!=', 'z')->get();
        // dd($penjualans);

        return view('penjualan.create',[
            "aksesoris"=>$aksesoris,
            "penjualans"=>$penjualans,
            "members"=>$members,
            "faktur"=>$faktur
        ]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }
    public function hapusPenjualan(Request $request)
    {
        $user = Auth::user();
        Penjualan::where('faktur', $request->id)->where('type', 'a')->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
        Mutasi::where('nomor_transaksi', $request->id)->where('type', 'a')->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
        
        return redirect()->route('penjualan.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
