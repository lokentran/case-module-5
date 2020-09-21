<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    function showIndex(Request $request) {

        if($request->session()->has('user')) {
            print_r(Session::get('user')->all);
        }

        return view('frontend.index');
    }
}
