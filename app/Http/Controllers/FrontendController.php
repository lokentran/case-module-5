<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    function showIndex(Request $request) {
        $houses = \App\Models\House::orderBy('id', 'DESC')->paginate(9);
        return view('frontend.index', compact('houses'));
    }



}
