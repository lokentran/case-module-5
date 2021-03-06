<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddHouseRequest;
use Illuminate\Support\Facades\Session;


class HouseController extends Controller
{
    function showFormAdd() {
        return view('frontend.house.add-house');
    }

    function postHouse(AddHouseRequest $request) {
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
        return view('frontend.house.detail-house', compact('house'));
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


    public function search(Request $request) {

        $name = $request->name;
        $address = $request->address;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;
        $typeHouse = $request->typeHouse;
        $typeRoom = $request->typeRoom;
        $bathroom = $request->bathroom;
        $bedroom = $request->bedroom;

        // dd($request->all());

        $houses = \App\Models\House::query();

        if (!empty($name)) {
            $houses = $houses->where('name', 'LIKE', '%' . $name . '%');
        }

        if (!empty($minPrice) && !empty($maxPrice)) {
            $houses = $houses->whereBetween('price', [$minPrice, $maxPrice]);
        } else if(!empty($minPrice) && empty($maxPrice)) {
            $houses = $houses->where('price', '>=' , $minPrice);
        } else if(empty($minPrice) && !empty($maxPrice)) {
            $houses = $houses->where('price', '<=' , $maxPrice);
        }

        if (!empty($address)) {
            $houses = $houses->where('address', 'LIKE', '%' . $address . '%');
        }

        if (!empty($typeHouse)) {
            $houses = $houses->where('typeHouse', 'LIKE', '%' . $typeHouse . '%');
        }

        if (!empty($bedroom)) {
            $houses = $houses->where('bedroom', 'LIKE', '%' . $bedroom . '%');
        }

        if (!empty($bathroom)) {
            $houses = $houses->where('bathroom', 'LIKE', '%' . $bathroom . '%');
        }

        $houses = $houses->get();

        return view('frontend.index', compact('houses'));
    }

    public function showCustomerHouse($id) {

        $user = \App\Models\User::findOrFail($id);
        $totalPriceByUser = DB::table('bills')
        ->join('houses', 'bills.house_id', 'houses.id')
        ->join('users', 'houses.user_id', 'users.id')
        ->select('bills.*', 'users.name', 'users.id', DB::raw('SUM(bills.totalPrice) as total'))
        ->groupBy('users.name')
        ->having('users.id','=', $id)
        ->get();

        // dd($totalPriceByUser);

        $results = DB::table('bills')
        ->join('users as users1','bills.user_id', 'users1.id' )
        ->join('houses', 'bills.house_id', 'houses.id')
        ->join('users', 'houses.user_id', 'users.id')
        ->select('bills.*', DB::raw('users1.name as user_rent'), 'houses.name', DB::raw('users.name as user_name')  )
        // ->whereBetween('bills.checkIn', [date('2020-10-9'), date('2020-10-15')])
        ->where('houses.user_id', '=', $id)
        ->get();

        // dd($results);

        return view('frontend.house.house-customer', compact('user','totalPriceByUser','results'));
    }

    public function searchCustomerHouse(Request $request,$id) {

        // $user = \App\Models\User::findOrFail($id);
        $totalPriceByUser = DB::table('bills')
        ->join('houses', 'bills.house_id', 'houses.id')
        ->join('users', 'houses.user_id', 'users.id')
        ->select('bills.*', 'users.name', 'users.id', DB::raw('SUM(bills.totalPrice) as total'))
        ->groupBy('users.name')
        ->having('users.id','=', $id)
        ->get();

        $name = $request->name;

        $results = DB::table('bills')
        ->join('users as users1','bills.user_id', 'users1.id' )
        ->join('houses', 'bills.house_id', 'houses.id')
        ->join('users', 'houses.user_id', 'users.id')
        ->select('bills.*', DB::raw('users1.name as user_rent'), 'houses.name', DB::raw('users.name as user_name')  )
        ->where('houses.user_id', '=', $id);


        if(!empty($name)) {
            $results = $results->where('houses.name', 'LIKE', '%' . $name . '%');
        }

        $results = $results->get();

        // dd($results);

        return view('frontend.house.house-customer', compact('results','totalPriceByUser'));

    }

    public function showHouseList($id) {

        $houses = DB::table('bills')
        ->join('users as user_rent', 'bills.user_id', 'user_rent.id')
        ->join('houses', 'bills.house_id', 'houses.id')
        ->join('users', 'houses.user_id', 'users.id')
        ->select('bills.*', 'houses.name as house_name', 'users.name', 'users.phone', 'user_rent.name as rent_name')
        ->where('user_rent.id', $id)
        ->get()
        ;

        $totalPriceByUser = DB::table('bills')
        ->join('users', 'bills.user_id', 'users.id')
        ->select('users.*', DB::raw('SUM(bills.totalPrice) as total'))
        ->groupBy('users.name')
        ->having('users.id', '=', $id)
        ->get()
        ;

        // dd($totalPriceByUser);
        // dd($houses);
        return view('frontend.house.house-order', compact('houses','totalPriceByUser'));
    }

    public function showResult() {
        $list = DB::table('bills')
        ->join('houses', 'bills.house_id', 'houses.id')
        ->join('users', 'houses.user_id', 'users.id')
        ->select('bills.*', 'users.name', 'users.id', DB::raw('SUM(bills.totalPrice) as total'))
        ->groupBy('users.name')
        ->having('users.id','=', $id)
        ->get();
    }

}
