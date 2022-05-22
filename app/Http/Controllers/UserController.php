<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formField = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|min:3',
            'password' => 'required|confirmed|max:6'
        ]);

        $formField['password'] = Hash::make($formField['password']);

        $user = User::create($formField);

        //login
        //auth()->login($user);
        auth()->attempt($request->only('email', 'password'));

        return redirect('/')->with('message', 'User created and logged in');

    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFeild = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFeild)){
            $request->session()->regenerate();

            return redirect('/')->with('message', "You are now logged in!");
        }

        return back()->withErrors(['email' => 'Invalid Cred'])->onlyInput('email');
    }
}
