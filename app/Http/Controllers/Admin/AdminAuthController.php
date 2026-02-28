<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role !== 'admin') {
                Auth::logout();
                return back()->with('error', 'You are not admin!');
            }

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
