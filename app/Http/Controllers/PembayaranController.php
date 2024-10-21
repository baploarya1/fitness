<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembayarans = Pembayaran::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->paginate(10);
         return view('pembayaran.index', compact('pembayarans'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pembayaran.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hapusPembayaran(Request $request)
    {
        //
        $id = $request->id;
        $user = Auth::user();

        $pembayaran = Pembayaran::where('id', $id)->where('type', 'a')->firstOrFail();
        $pembayaran->type = 'z';
        $pembayaran->username = $user->name;
        $pembayaran->user_id = $user->id;
        $pembayaran->save();
        
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    public function store(Request $request)
    {
        //

        $request->validate([
            'kode_pembayaran' => 'required|string|max:255',
            'nama_pembayaran' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
                  
            
        ]);
        if(isset($request->id)){
            $member = Pembayaran::find($request->id);
            $member->type = 'z';
            $member->save();
        }
        $request->validate(['kode_pembayaran' => ['required','string','max:255',Rule::unique('transaksi')->where(function ($query) {
                        return $query->where('type', 'a');
                    }),
        ]]);
        $user = Auth::user();
    
           
            // Simpan data member ke database
            Pembayaran::create([
                'kode_pembayaran' => $request->kode_pembayaran,
                'nama_pembayaran' => $request->nama_pembayaran,
                'keterangan' => $request->keterangan,
                'type' =>  "a",
                'username' =>  $user->name,
                'user_id' => $user->id,
            ]);
            return redirect()->route('pembayaran.index')->with('success', 'pembayaran berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pembayaran = Pembayaran::find($id);
        

        return view('pembayaran.edit',[
            "pembayaran"=>$pembayaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
