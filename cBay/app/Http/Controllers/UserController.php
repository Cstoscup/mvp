<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function create() {
        return view('users.create');
    }

    public function login() {
        return view('users.login');
    }

    // store new listing data in database
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        // log in
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function verify(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Login Attempt', 'password' => 'Invalid Login Attempt']);
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
