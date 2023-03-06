<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $SignUpFields = $request->validate(
            [
                'Firstname' => ['required', 'string', 'max:255'],
                'Lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
            ],
            ['password.regex' => 'The password must contain at least one special character.']
        );

        $SignUpFields['password'] = bcrypt($SignUpFields['password']);

        $user = User::create($SignUpFields);

        auth()->login($user);

        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $loginFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($loginFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput();
    }

    public function showProfile()
    {
        return view('pages.profile');
    }
}
