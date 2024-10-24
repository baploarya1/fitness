<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->paginate(10);
         return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supplier.create');

    }
    public function hapusSupplier(Request $request)
    {
        //
        $id = $request->id;
        $user = Auth::user();

        $supplier = Supplier::where('id', $id)->where('type', 'a')->firstOrFail();
        $supplier->type = 'z';
        $user->username = $user->name;
        $user->user_id = $user->id;
        $supplier->save();
        
        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Dihapus!']);

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
                'kode_supplier' => 'required|string|max:50',
                'nama_supplier' => 'required|string|max:100',
                'no_hp' => 'nullable|numeric',
                'alamat' => 'nullable|string',
                'nama_kontak' => 'nullable|string',
            ]);
            if(isset($request->id)){
                $member = Supplier::find($request->id);
                $member->type = 'z';
                $member->save();
            }
            $request->validate(['kode_supplier' => ['required','string','max:255',Rule::unique('supplier')->where(function ($query) {
                    return $query->where('type', 'a');
            }),
            ]]);
            $user = Auth::user();
     
            // Jika validasi berhasil, simpan data ke database
            Supplier::create([
                'kode_supplier' => $request->kode_supplier,
                'nama_supplier' => $request->nama_supplier,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'nama_kontak' => $request->nama_kontak,
                'type' => "a",
                'username' => $user->name,
                'user_id' => $user->id
               
            ]);
        // } catch (ValidationException $e) {
        //     // Menangkap kesalahan validasi
        //     $errors = $e->validator->errors();
        //     dd($errors);exit;
        //   }
          
        return redirect()->route('supplier.index')->with('success', 'Member berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $supplier = Supplier::find($id);
        

        return view('supplier.edit',[
            "supplier"=>$supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
