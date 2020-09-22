<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HouseController extends Controller
{
    function showFormAdd() {
        return view('frontend.pages.add-house');
    }

    function postHouse(Request $request) {
        $house = new House();
        $house->name = $request->name;
        $house->price = $request->price;
        $house->address = $request->address;
        $house->typeHouse = $request->typeHouse;
        $house->typeRoom = $request->typeRoom;
        $house->bedroom = $request->bedroom;
        $house->bathroom = $request->bathroom;
        $house->user_id = $request->user_id;
        $house->description = $request->description;
        // $house->image = $request->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $house->image = $path;
        }
        $house->save();
        // dd($request->all());
        return \redirect()->route('index');
    }

    public function detail($id) {
        $house = \App\Models\House::findOrFail($id);
        return view('frontend.pages.detail-house', compact('house'));
    }

    public function rentHome(Request $request) {
        $userRent = [];
        $userRent['id'] = $request->user_id;
        $userRent['house_id'] = $request->house_id;
        $userRent['checkIn'] = $request->checkIn;
        $userRent['checkOut'] = $request->checkOut;

        Session::put('userRent', $userRent);
        // var_dump(Session::get('userRent'));
        return redirect()->route('house.confirm', $request->user_id);
    }

    public function confirmIndex() {
        $subDay = \Carbon\Carbon::parse( Session::get('userRent')['checkIn'])->diffInDays( Session::get('userRent')['checkOut'] );
        $house = \App\Models\House::findOrFail(Session::get('userRent')['house_id']);
        $totalPrice = $subDay * $house->price;
        return view('frontend.pages.confirm', compact('house', 'totalPrice'));
    }

    public function confirmPost() {
        $start_date = Session::get('userRent')['checkIn'];
        $end_date = Session::get('userRent')['checkOut'];
        $totalDay = \Carbon\Carbon::parse( Session::get('userRent')['checkIn'])->diffInDays( Session::get('userRent')['checkOut'] );
    }

}
