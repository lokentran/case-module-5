<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseController extends Controller
{
    function showFormAdd() {
        return view('frontend.pages.add-house');
    }
}
