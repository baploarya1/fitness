<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Models\Kategori;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Mpdf\Mpdf;
 
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksis = Transaksi::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->paginate(10) // Paginate the results
        ->appends(request()->query()); // Keep query parameters in pagination links
        return view('transaksi.index', compact('transaksis'));

    }

    public function ajaxLoadPaket(Request $request){
        $data = Paket::select('kode_paket','nama_paket')->where('kode_kategori', $request->kode_kategori)->where('type', '!=', 'z')->get();
        // echo "<option value=''>-Pilih Paket-</option>";
        foreach ($data as $d) {
            echo "<option value='$d[kode_paket]'>$d[nama_paket]</option>";
        }
        // return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $members = Member::select("nomor_member","nama_member")->where('type', '!=', 'z')->get();
        $kategoris = Kategori::select("kode_kategori","nama_kategori")->where('type', '!=', 'z')->get();
        $pakets = Paket::select("kode_paket","nama_paket")->where('type', '!=', 'z')->get();
        $pembayarans = Pembayaran::select("kode_pembayaran","nama_pembayaran")->where('type', '!=', 'z')->get();
        // dd($member);
        return view('transaksi.create',compact('members','pakets','kategoris','pembayarans'));

    }

    public function cetakPembayaran(Request $request)
    {
         
        // $pembayaran = Pembayaran::find($request->id);
        // dd($request->id);
        $transaksi = DB::table('transaksi')
        ->join('member', 'transaksi.nomor_member', '=', 'member.nomor_member')
        ->join('paket', 'transaksi.kode_paket', '=', 'paket.kode_paket')
        ->join('pembayaran', 'transaksi.kode_pembayaran', '=', 'pembayaran.kode_pembayaran')
        ->where('transaksi.id', $request->id)
        // ->select('transaksi.*', 'member.*')
        ->first();
    
        // dd($transaksi);
        $mpdf = new Mpdf([
            'margin_left' => 12,
            'margin_right' => 12,
            'margin_top' => -12,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);

        // Load the view content
        $html = view('transaksi.cetak',compact('transaksi'))->render();

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);

        // Output the PDF as a download
        $mpdf->Output();
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
        try{
            // dd($request->all());
            $request->validate([
                'nomor_member' => 'nullable|string|max:255',
                'nomor_transaksi' => 'nullable|string|max:255',
                'kode_pembayaran' => 'nullable|string|max:255',
                'tanggal_transaksi' => 'nullable|date',
                'kode_paket' => 'nullable|string|max:255',
                'keterangan' => 'nullable|string',
                'status' => 'nullable|string|max:255'             
                
            ]);
            if(isset($request->id)){
                $member = Transaksi::find($request->id);
                $member->type = 'z';
                $member->save();
            }
            $request->validate(['nomor_member' => ['required','string','max:255',Rule::unique('transaksi')->where(function ($query) {
                            return $query->where('type', 'a');
                        }),
            ]]);
            $user = Auth::user();
    
           
            // Simpan data member ke database
            Transaksi::create([
                'nomor_member' => $request->nomor_member,
                'nomor_transaksi' => $request->nomor_transaksi,
                'kode_pembayaran' => $request->kode_pembayaran,
                'tanggal_transaksi' => $request->tanggal_transaksi,
                'kode_paket' => $request->kode_paket,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
                'type' =>  "a",
                'username' =>  $user->name,
                'user_id' => $user->id,
            ]);
        } catch (ValidationException $e) {
            // Menangkap kesalahan validasi
            $errors = $e->validator->errors();
            // dd($errors);exit;
          }
        // dd($request->all());
       
   

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }
    public function hapusTransaksi(Request $request)
    {
        //
        $id = $request->id;

        $Transaksi = Transaksi::find($id);
        $Transaksi->type = 'z';
        $Transaksi->save();
        
        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //       
        $transaksi = Transaksi::find($id);

        // dd($transaksi);
        $members = Member::select("nomor_member","nama_member")->where('type', '!=', 'z')->get();
        $pakets = Paket::select("kode_paket","nama_paket")->where('type', '!=', 'z')->get();
        $pembayarans = Pembayaran::select("kode_pembayaran","nama_pembayaran")->where('type', '!=', 'z')->get();
        // dd($member);
        return view('transaksi.edit',compact('members','pakets','pembayarans','transaksi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
