<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua data user dari database
        $users = User::with('role')->get();

        // Tampilkan halaman index
        return view('User.index', compact('users'));
    }

    public function create()
    {
        // Ambil data roles dari database
        $roles = Role::all();

        // Tampilkan form create user dengan passing data roles
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman User.index
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Ambil data roles dari database
        $roles = Role::all();

        // Tampilkan halaman edit dengan passing data user dan roles
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman User.index
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Hapus data user
        $user->delete();

        // Redirect ke halaman User.index
        return redirect()->route('user.index');
    }
}
