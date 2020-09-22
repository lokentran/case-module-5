<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function confirmIndex() {
        $subDay = \Carbon\Carbon::parse( Session::get('userRent')['checkIn'])->diffInDays( Session::get('userRent')['checkOut'] );
        $house = \App\Models\House::findOrFail(Session::get('userRent')['house_id']);
        $totalPrice = $subDay * $house->price;
        return view('frontend.pages.confirm', compact('house', 'totalPrice'));
    }

    public function confirmPost(Request $request) {
        $bill = new Bill();
        $bill->totalPrice = $request->totalPrice;
        $bill->checkIn = $request->checkIn;
        $bill->checkOut = $request->checkOut;
        $bill->house_id = $request->house_id;
        $bill->user_id = $request->user_id;

        // dd($request->all());
        $bill->save();
        return redirect()->route('bill.success');
    }

    public function success() {
        return view('frontend.pages.confirm-success');
    }
}
