<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function showFormLogin() {
        return view('layouts.login');
    }

    function showFormRegister() {
        return view('layouts.register');
    }

    
}
