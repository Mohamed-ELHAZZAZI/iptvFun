<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(["email" => $request->email, 'password' => $request->password])) {
            /** @var \App\Models\user $user */
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('main')->plainTextToken;
            unset($user['created_at'], $user['updated_at'], $user['email_verified_at']);

            return response()->json([
                'user' => $user,
                'token' => $token,
                'success' => true
            ]);
        }
        return response()->json([
            'error' => 'The provided credentials are not correct',
            'success' => false
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
