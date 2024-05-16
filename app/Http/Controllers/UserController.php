<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function create() {
        return view('users.register');
    }

    public function store(Request $request) {
        $registerFileds = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required' , 'confirmed' , 'min:6']
        ]);

        //hash password
        $registerFileds['password'] = bcrypt($registerFileds['password']);

        //Create user
        $user = User::create($registerFileds);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    //logout
    public static function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'U have been logged out');
    }

    //Login
    public function login() {
        return view('users.login');
    }

    //auth  
    public function auth(Request $request) {
        $loginFileds = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($loginFileds)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
