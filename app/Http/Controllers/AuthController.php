<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            Auth::user();
            return redirect()->to('/dashboard');
        }

        return back()->with('loginError', 'Email atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
