<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function showFormLogin() {
        return view('frontend.pages.login');
    }

    function showFormRegister() {
        return view('frontend.pages.register');
    }

    function login(\App\Http\Requests\LoginRequest $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($data)) {
            return back();
        }

        if(Auth::user()->is_admin == 1) {
            return \redirect()->route('admin.index');
        }

        return redirect()->route('index');

    }

    public function logout() {
        Auth::logout();
        return \redirect()->route('login.show');
    }

    public function register(\App\Http\Requests\RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        if ($request->hasFile('avatar')) {
            $cover = $request->file('avatar');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user->image = $newFileName;
        }
        $user->save();

        return redirect()->route('login.show');
    }
    public function showProfile($id) {
        $user = User::findOrFail($id);
        return view('frontend.user.user-profile', compact('user'));
    }

    public function updateProfile(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        if ($request->hasFile('avatar')) {
            $cover = $request->file('avatar');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user->image = $newFileName;
        }

        // dd($request->all());
        $user->save();
        return redirect()->route('profile.show', $id);
    }

    public function showFormChangePass() {
        return view('frontend.user.change-password');
    }

    public function  updatePass(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {

            return redirect()->back();
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){

            return redirect()->back();
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back();
    }

}
