<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $path = $image->store('images', 'public');
        //     $house->image = $path;
        // }
        // $house->save();
        // // dd($request->all());
        // return \redirect()->route('index');

        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('photos');
            $exe_flg = true;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if (!$check) {
                    $exe_flg = false;
                    break;
                }
            }
            if ($exe_flg) {
                $house->save();
                foreach ($request->photos as $photo) {
                    $filename = $photo->store('images', 'public');
                    $image = new Image();
                    $image->image = $filename;
                    $image->house_id = $house->id;
                    $image->save();
                }

                return redirect()->route('index');
            } else {

                return redirect()->route('houses.list');
            }

        }

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
        return redirect()->route('house.confirm', $request->house_id);
    }


}
