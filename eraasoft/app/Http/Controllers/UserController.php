<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Register Form
    public function register() {
        return view('users.register');
    }

    // Store Data From Register Form
    public function doRegister(Request $request) {

        $formData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);

        auth()->login($user);

        return redirect('/login')->with('message', 'User Created Succefully!');
    }

    //Login Form
    public function login() {
        return view('users.login');
    }

    //Login
    public function doLogin(Request $request) {

        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($formData)) {
            $request->session()->regenerate();

            return redirect ('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email'=>'invalid credintials'])->onlyInput('email');
    }



    // Logout
    public function logout(User $user) {
        auth()->logout();
        return redirect('/login')->with('message', 'You have been logged out!');
    }
}
