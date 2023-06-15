<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|string',
            'phone' => 'required|numeric|digits:12',
            'password' => 'required|min:3',
        ], [
            'name.required' => 'Kolom nama harus diisi.',
            'email.required' => 'Kolom email harus diisi.',
            'phone.required' => 'Kolom Nomor Telepon harus diisi.',
            'password.required' => 'Kolom password harus diisi.',
            'name.string' => 'Kolom nama tidak boleh angka.',
            'email.string' => 'Kolom email tidak boleh angka.',
            'phone.numeric' => 'Kolom Nomor Telepon harus berupa angka.',
            'password.min' => 'Kolom password minimal diisi 3 karakter.',
            'name.min' => 'Kolom nama minimal diisi 3 karakter.',
            'phone.digits' => 'Kolom Nomor Telepon diisi 12 digit.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $store = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 3,
            'password' => Hash::make($request->password),
        ]);

        if ($store) {
            return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
        } else {
            return redirect()->back()->with('error', 'Register gagal, silahkan coba lagi');
        }
    }
}
