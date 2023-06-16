<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgetpasswordController extends Controller
{
    public function index(){
        return view('auth.forgetpassword');
    }
    public function forget(Request $request){
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
        $user = User::where('email', $request->email)
            ->where('name', $request->name)
            ->where('phone', $request->phone)
            ->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Password berhasil terupdate.');
        } else {
            return redirect()->back()->withErrors(['data' => 'Data yang dimasukkan tidak cocok.']);
        }
    }
}
