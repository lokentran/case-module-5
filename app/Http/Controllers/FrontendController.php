<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function showIndex() {
        return view('master.master');
    }
}
