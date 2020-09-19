<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function showFormLogin() {
        return view('frontend.pages.login');
    }

    function showFormRegister() {
        return view('frontend.pages.register');
    }





}
