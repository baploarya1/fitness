<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Models\Paket;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
 
class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pakets = Paket::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->paginate(10);
         return view('paket.index', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategoris = Kategori::select('kode_kategori','nama_kategori')->where('type', '!=', 'z')->get();

        return view('paket.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
          // Melakukan validasi input
        //   try {
            //code...
            $request->validate([
                'kode_paket' => 'required|string|max:50',
                'nama_paket' => 'required|string|max:100',
                'kode_kategori' => 'nullable|string|max:50',
                'tanggal_mulai_berlaku' => 'nullable|date',
                'tanggal_habis_berlaku' => 'nullable|date',
                'jumlah_peserta' => 'nullable|integer',
                'durasi' => 'nullable|integer',
                'harga_paket' => 'nullable',
                'status' => 'nullable|string', // Contoh status, sesuaikan dengan kebutuhan
                'type' => 'nullable|string' // Contoh tipe, sesuaikan dengan kebutuhan
            ]);
            if(isset($request->id)){
                $member = Paket::find($request->id);
                $member->type = 'z';
                $member->save();
            }
            $request->validate(['kode_paket' => ['required','string','max:255',Rule::unique('paket')->where(function ($query) {
                    return $query->where('type', 'a');
            }),
            ]]);
            $user = Auth::user();
            $hargaPaket = number_format((float)str_replace(',', '', $request->harga_paket), 2, '.', '');
    
            // Jika validasi berhasil, simpan data ke database
            Paket::create([
                'kode_paket' => $request->kode_paket,
                'nama_paket' => $request->nama_paket,
                'kode_kategori' => $request->kode_kategori,
                'durasi' => (string)$request->durasi ." Bulan",
                'tanggal_mulai_berlaku' => $request->tanggal_mulai_berlaku,
                'tanggal_habis_berlaku' => $request->tanggal_habis_berlaku,
                'jumlah_peserta' => $request->jumlah_peserta,
                'harga_paket' => $hargaPaket,
                'status' => $request->status,
                'type' => "a",
                'username' => $user->name,
                'user_id' => $user->id
            ]);
        // } catch (ValidationException $e) {
        //     // Menangkap kesalahan validasi
        //     $errors = $e->validator->errors();
        //     dd($errors);exit;
        //   }
          
        return redirect()->route('paket.index')->with('success', 'Member berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $paket = Paket::find($id);
        $kategoris = Kategori::select('kode_kategori','nama_kategori')->where('type', '!=', 'z')->get();


        return view('paket.edit',[
            "paket"=>$paket,
            "kategoris"=>$kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        //
    }
    public function hapusPaket(Request $request)
    {
        //
        $id = $request->id;

        $paket = Paket::find($id);
        $paket->type = 'z';
        $paket->save();
        
        return redirect()->route('paket.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        //
    }
}
