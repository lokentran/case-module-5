<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $email = $request->email;
        $password =md5($request->password);

        $user = User::where([
            ['email', '=', $email],
            ['password', '=', $password],
        ])->first();
        if ($user) {
            Session::put('user', $user);
            // echo "<pre>";
            // print_r(Session::get('user')->email);
            return redirect()->route('index');
        } else {

            Session::put('mess', 'Sai tên đăng nhập hoặc mật khẩu!');
            return redirect()->route('login.show');
        }
    }

    function logout(){
        Session::put('user', null);
        return \redirect()->route('login.show');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
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

        Session::put('user', $user);

        return redirect()->route('index');
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

}
