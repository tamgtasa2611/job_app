<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function login() {
        return view('users.login');
    }

    public function loginProcess(Request $request) {
        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if($validated) {
            $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (!Auth::attempt($data)) {
                return back()->with('fail', 'Wrong email or password!');
            } else {
                $request->session()->regenerate();
                return Redirect::route('home')->with('success', 'Login successfully!');
            }
        }

        return back()->with('fail', 'Wrong email or password!');
    }

    public function logOut(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return Redirect::route('home')->with('success', 'Log Out successfully!');
    }

    public function register() {
        return view('users.register');
    }

    public function registerProcess(StoreUserRequest $request) {
        $validated = $request->validated();

        if($validated) {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            User::create($credentials);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return Redirect::route('home')->with('success', 'Sign Up successfully!');
            }
            return Redirect::back()->with('fail', 'Something went wrong!');
        } else {
            return Redirect::back()->with('fail', 'Something went wrong!');
        }
    }
}
