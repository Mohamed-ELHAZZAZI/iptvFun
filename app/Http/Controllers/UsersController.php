<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function showLogin(Request $request)
    {
        return view('auth.login', [
            'redirect' => $request->redirect
        ]);
    }

    public function showRegister(Request $request)
    {
        return view('auth.register', [
            'redirect' => $request->redirect
        ]);
    }

    public function store(Request $request)
    {
        $SignUpFields = $request->validate(
            [
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
            ],
            ['password.regex' => 'The password must contain at least one special character.']
        );

        $SignUpFields['password'] = bcrypt($SignUpFields['password']);

        $user = User::create($SignUpFields);

        auth()->login($user);

        $redirect = $request->redirect ? $request->redirect : null;
        if ($redirect) {
            return Redirect::to($redirect);
        }

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

            $redirect = $request->redirect ? $request->redirect : null;
            if ($redirect) {
                return Redirect::to($redirect);
            }

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput($request->only('email'));
    }

    public function showProfile()
    {
        return view('pages.profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function updateInfo(Request $request)
    {
        $info = $request->validate(
            [
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            ],
        );

        auth()->user()->firstName = $info['firstName'];
        auth()->user()->lastName = $info['lastName'];
        auth()->user()->email = $info['email'];
        auth()->user()->save();
        return redirect()->back()->with('successInfo', 'Your profile information was updated successfully!');
    }

    public function updatePass(Request $request)
    {

        $pass = Validator::make(
            $request->all(),
            [
                'current_password' => 'required',
                'new_password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
            ],
            ['new_password.regex' => 'The password must contain at least one special character.']
        );

        if ($pass->fails()) {
            return redirect()->back()->with('passError', $pass->errors()->messages());
        }


        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('passError', ['incorrect' => ['Incorrect password']]);
        }

        auth()->user()->password = bcrypt($request->new_password);
        auth()->user()->save();

        return redirect()->back()->with('successPass', 'Password changed successfully.');
    }
}
