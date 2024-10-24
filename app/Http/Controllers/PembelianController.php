<?php

namespace App\Http\Controllers;

use App\Models\Aksesoris;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\PurchaseHelper; // Tambahkan ini
use App\Models\Mutasi;
use App\Models\Supplier;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembelians = Pembelian::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->select('faktur', 'tanggal_pembelian')->distinct()
        ->paginate(10);
         return view('pembelian.index', compact('pembelians'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // return $request;
        // return $request->input('param');
        try {
    
            $data = $request->input('items');
            $faktur = $request->input('param');
            $tanggal_pembelian = $request->input('tanggal_pembelian');

            
            // return $data[0]['harga'];
            $kodePembelian = PurchaseHelper::generatePurchaseCode("PMB");
             // Simpan data member ke database
            $user = Auth::user();
            // jika update
            
            if ($faktur !== '-') {
                Pembelian::where('faktur', $faktur)->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
                Mutasi::where('nomor_transaksi', $faktur)->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
            }
            foreach ($data as $key => $value) { 
                Pembelian::create([
                    'faktur' => $faktur == '-'?$kodePembelian: $faktur,
                    'kode_barang' => $value['kode_aksesoris'],
                    'nama_barang' => $value['nama_barang'],
                    'kode_supplier' => $value['kode_supplier'],
                    'nama_supplier' => $value['nama_supplier'],
                    'satuan' => $value['satuan'],
                    'harga' => $value['harga'],
                    'sub_total' => $value['sub_total'],
                    'tanggal_pembelian' => $tanggal_pembelian,
                    'qty_satuan_kecil' => $value['jumlah'],
                    'type' =>  "a",
                    'username' =>  $user->name,
                    'user_id' => $user->id,
                ]);
                Mutasi::create([
                    'nomor_transaksi' =>  $faktur == '-'?$kodePembelian: $faktur ,
                    'kode_aksesoris' => $value['kode_aksesoris'],
                    'keterangan' => 'PEMBELIAN',
                    'jenis' => 'MASUK',
                    'satuan' => $value['satuan'],
                    'harga' => $value['harga'],
                    'tanggal_transaksi' => $tanggal_pembelian,
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
    public function generatePurchaseCode()
    {
        // Mengambil waktu saat ini
        $timestamp = time();
        
        // Menghasilkan string acak
        $randomString = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);
        
        // Menggabungkan timestamp dan string acak untuk membuat kode pembelian
        $purchaseCode = "PC-" . date("Ymd", $timestamp) . "-" . $randomString;

        return $purchaseCode; // Kembalikan sebagai string
    }

    public function create()
    {
        //
        $suppliers = Supplier::select("kode_supplier","nama_supplier","alamat")->where('type', '!=', 'z')->get();

        $aksesoris = Aksesoris::select("kode_aksesoris","nama_aksesoris","satuan")->where('type', '!=', 'z')->get();

        return view('pembelian.create',[
            "aksesoris"=>$aksesoris,
            "suppliers"=>$suppliers,
            "pembelians"=>[],
        ]);

    }
    public function edit($faktur)
    {
        //
        $suppliers = Supplier::select("kode_supplier","nama_supplier","alamat")->where('type', '!=', 'z')->get();

        // dd($suppliers);
        $aksesoris = Aksesoris::select("kode_aksesoris","nama_aksesoris","satuan")->where('type', '!=', 'z')->get();
        $pembelians = Pembelian::select('kode_barang as kode_aksesoris','kode_supplier','nama_supplier','nama_barang','tanggal_pembelian','faktur','harga','sub_total','satuan','qty_satuan_kecil AS jumlah')->where('faktur', $faktur)->where('type', '!=', 'z')->get();

        return view('pembelian.create',[
            "aksesoris"=>$aksesoris,
            "suppliers"=>$suppliers,
            "pembelians"=>$pembelians,
            "faktur"=>$faktur
        ]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function hapusPembelian(Request $request)
    {
        $user = Auth::user();
        Pembelian::where('faktur', $request->id)->where('type', 'a')->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
        Mutasi::where('nomor_transaksi', $request->id)->where('type', 'a')->update(['type' => 'z','username' => $user->name,'user_id' => $user->id]);
        
        return redirect()->route('pembelian.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
