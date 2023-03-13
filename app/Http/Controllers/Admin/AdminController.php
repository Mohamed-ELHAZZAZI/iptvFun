<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(Request $request)
    {
        $loginFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt($loginFields)) {
            return redirect()->route('admin.home');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput($request->only('email'));
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
