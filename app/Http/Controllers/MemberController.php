<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $dasdsa = "";

    public function index()
    {
        
        $members = Member::filter(request()->only(['search']))
        ->where('type', '!=', 'z') // Filter berdasarkan type
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->paginate(10) // Paginate the results
        ->appends(request()->query()); // Keep query parameters in pagination links

        // dd($members);
        return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('member.create');
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
        // Validasi data
        //  dd(Member::find($request->id));exit;
        // $hargaPaket = str_replace(',', '', $request->harga_paket);
    
            $request->validate([
                'nomor_member' => 'required|string|max:255',
                'nomor_kartu_member' => 'required|string|max:255',
                'nama_member' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'tempat_lahir' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
                'alamat' => 'nullable|string',
                'nomor_ktp' => 'required|string|max:255',
                'nomor_handphone' => 'required|string|max:255',
                'pekerjaan' => 'nullable|string|max:255',
                'status_member' => 'nullable|string|max:255',
                'tanggal_registrasi' => 'nullable|date',
                'photo_ktp' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
                'photo_member' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
                 
            ]);
            if(isset($request->id)){
                $member = Member::find($request->id);
                $member->type = 'z';
                $member->save();
            }
            $request->validate(['nomor_member' => ['required','string','max:255',Rule::unique('member')->where(function ($query) {
                            return $query->where('type', 'a');
                        }),
            ],'nomor_kartu_member' => ['required','string','max:255',
                        Rule::unique('member')->where(function ($query) {
                            return $query->where('type', 'a');
                        }),
                ]]);
            // Proses upload foto KTP jika ada
            $photoKtpPath = $request->file('photo_ktp') ? 
                // $request->file('photo_ktp')->store('photos/ktp', 'public') : null;
                $request->file('photo_ktp')->store('photos/'.$request->nomor_member.".".$request->nama_member, 'public') : null;
    
            // Proses upload foto member jika ada
            $photoMemberPath = $request->file('photo_member') ? 
                // $request->file('photo_member')->store('photos/members', 'public') : null;
                $request->file('photo_member')->store('photos/'.$request->nomor_member.".".$request->nama_member, 'public') : null;
                $user = Auth::user();

           
            // Simpan data member ke database
            Member::create([
                'nomor_member' => $request->nomor_member,
                'nama_member' => $request->nama_member,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'nomor_ktp' => $request->nomor_ktp,
                'nomor_handphone' => $request->nomor_handphone,
                'pekerjaan' => $request->pekerjaan,
                'status_member' => $request->status_member,
                'tanggal_registrasi' => $request->tanggal_registrasi,
                'photo_ktp' => $photoKtpPath,
                'photo_member' => $photoMemberPath,
                'nomor_kartu_member' => $request->nomor_kartu_member,
                'type' =>  "a",
                'username' =>  $user->name,
                'user_id' => $user->id,
            ]);
       

        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $Member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $member = Member::find($id);
        

        return view('member.edit',[
            "member"=>$member
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $Member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function hapusMember(Request $request)
    {
        //
        $id = $request->id;
        $user = Auth::user();

        $member = Member::where('id', $id)->where('type', 'a')->firstOrFail();
        $member->type = 'z';
        $member->username = $user->name;
        $member->user_id = $user->id;
        $member->save();
        
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
