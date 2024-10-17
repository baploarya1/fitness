<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SomeService;
use  Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // protected $someService;

    // public function __construct(SomeService $someService)
    // {
    //     $this->someService = $someService;
    // }

    public function index()
    {

        $users = User::with('roles')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->except('1');
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['name' => $request->username]);
        // $request->merge(['password_confirmation' => $request->ulangipassword]);
 
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255','unique:users,name'],
            // 'username' => ['required', 'string', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);

        $users = User::create([
            'name'    => $request->username,
            'email'    => $request->email,
            'password'    => bcrypt($request->password),
        ]);

        $users->assignRole($request->role);

        return redirect()->route('user.index')->with(['success' => 'User Berhasil Ditambah!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changePassword()
    {
        return view('user.change-password');
    }

    public function updatePassword(Request $request)
    {


        $request->validate([
            'password_lama' => 'required',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Periksa apakah password lama sesuai
        if (!Hash::check($request->password_lama, $user->password)) {

            return redirect()->back()->with('error', 'Password lama tidak valid.');
        }

        // Ubah password pengguna
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/')->with('success', 'Password berhasil diubah.');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::all()->except('1');
        return view('user.edit', compact('roles', 'user'));
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required', 'string', 'max:255', 'unique:users,' . $id,
            'role' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);

        // Jika peran adalah "administrator", atur aturan validasi untuk memastikan tidak ada input role dari pengguna

        $users = User::findOrFail($id);

        $role_name = $users->getRoleNames();
        $users->removeRole($role_name[0]);

        $users->update([
            'name'    => $request->name,
            'username'    => $request->username,

        ]);

        $users->assignRole($request->role);

        return redirect()->route('user.index')->with(['success' => 'User Berhasil Ditambah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $users = User::findOrFail($id);

        $role_name = $users->getRoleNames();
        $users->removeRole($role_name[0]);
        $users->delete();
        // $this->someService->deleteTemp($users->username);

        if ($users) {
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    
    public function hapusUser(Request $request)
    {
        $id = $request->id;

        $users = User::findOrFail($id);

        $role_name = $users->getRoleNames();
        $users->removeRole($role_name[0]);
        $users->delete();
        // $this->someService->deleteTemp($users->username);

        if ($users) {
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
