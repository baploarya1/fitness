<?php

namespace App\Http\Controllers;

use App\Helpers\PurchaseHelper;
use App\Models\Aksesoris;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AksesorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $aksesories = Aksesoris::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->paginate(10);
         return view('aksesoris.index', compact('aksesories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('aksesoris.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected $faktur = '-';
    public function store(Request $request)
    {
        //
        // dd($request->all());
          // Melakukan validasi input
        //   try {
            //code...
            $request->validate([
                'kode_aksesoris' => 'required|string|max:50',
                'nama_aksesoris' => 'required|string|max:100',
                'satuan' => 'required|string|max:100',
                'stok_awal' => 'required|integer',
                // 'stok_akhir' => 'nullable|integer',
                // 'barang_masuk' => 'nullable|integer',
                'harga' => 'required',
                 // Contoh tipe, sesuaikan dengan kebutuhan
            ]);
            if(isset($request->id)){
                $aksesoris = Aksesoris::find($request->id);
                $this->faktur= $aksesoris->kode_aksesoris;
                $mutasi = Mutasi::where('kode_aksesoris', $aksesoris->kode_aksesoris)->first();
                $mutasi->type = 'z';
                $mutasi->save();
                $aksesoris->type = 'z';
                $aksesoris->save();
            }
            $request->validate(['kode_aksesoris' => ['required','string','max:255',Rule::unique('aksesoris')->where(function ($query) {
                            return $query->where('type', 'a');
                        }),
            ]]);
            $user = Auth::user();
            $harga = number_format((float)str_replace(',', '', $request->harga), 2, '.', '');
            $kodemotasi = PurchaseHelper::generatePurchaseCode("STOK-AWAL");

 
            // dd($faktur);
            // Jika validasi berhasil, simpan data ke database
            Aksesoris::create([
                'kode_aksesoris' => $request->kode_aksesoris,
                'nama_aksesoris' => $request->nama_aksesoris,
                'stok_awal' => $request->stok_awal,
                'satuan' => $request->satuan,
                // 'barang_masuk' => $request->barang_masuk,
                'harga' => $harga,
                'type' => "a",
                'username' => $user->name,
                'user_id' => $user->id
            ]);
            Mutasi::create([
                'nomor_transaksi' =>  $this->faktur == '-'?$kodemotasi: $this->faktur ,
                'kode_aksesoris' => $request->kode_aksesoris,
                'keterangan' => 'STOK AWAL',
                'jenis' => 'MASUK',
                'satuan' => $request->satuan,
                'harga' => $harga,
                'tanggal_transaksi' => date('Y-m-d'),
                'qty_satuan_kecil' =>  $request->stok_awal,
                'type' =>  "a",
                'username' =>  $user->name,
                'user_id' => $user->id,
            ]);
        // }catch (\Exception $e) {
        //         // Handle the exception
        //         dd($e->getMessage());
        //         return response()->json(['error' => $e->getMessage()], 500);
        //     }
          
        return redirect()->route('aksesoris.index')->with('success', 'Member berhasil ditambahkan!');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aksesoris  $aksesoris
     * @return \Illuminate\Http\Response
     */
    public function show(Aksesoris $aksesoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aksesoris  $aksesoris
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $aksesoris = Aksesoris::find($id);
        

        return view('aksesoris.edit',[
            "aksesoris"=>$aksesoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aksesoris  $aksesoris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aksesoris $aksesoris)
    {
        //
    }
    public function hapusAksesoris(Request $request)
    {
        //
        $id = $request->id;

        $Aksesoris = Aksesoris::where('id', $id)->where('type', 'a')->firstOrFail();
        $Aksesoris->type = 'z';
        $mutasi = Mutasi::where('kode_aksesoris', $Aksesoris->kode_aksesoris)->first();
        $Aksesoris->save();
        $mutasi->type = 'z';
        $mutasi->save();
        return redirect()->route('aksesoris.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aksesoris  $aksesoris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aksesoris $aksesoris)
    {
        //
    }
}
