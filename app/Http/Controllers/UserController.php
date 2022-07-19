<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('register-form');
    }

    public function createUser(UserRequest $request)
    {
        $user = $request->only('name', 'email', 'password');
        $user['password'] = Hash::make($user['password']);

        User::create($user);
        return redirect()->route('user.show-register');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $auth = Auth::attempt($request->only('email', 'password'));
        if ($auth) {
            return redirect()->route('product.index');
        }
        return redirect()->back()->withErrors(['msg' => 'Invalid credential']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
