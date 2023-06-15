<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetpasswordController extends Controller
{
    public function index(){
        return view('auth.forgetpassword');
    }
}
