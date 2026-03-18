<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // ✅ remember = creates "remember_web_*" cookie
        $remember = $request->boolean('remember');

        if (Auth::attempt($request->only('email', 'password'), $remember)) {

            // ✅ session protection
            $request->session()->regenerate();

            // ✅ If remember checked, Laravel will store cookie automatically.
            // ✅ Session stays active too.

            $user = Auth::user();

            if ($user->hasRole('admin')) return redirect()->route('dashboard');
            if ($user->hasRole('teacher')) return redirect()->route('dashboard');
            if ($user->hasRole('staff')) return redirect()->route('dashboard');
            if ($user->hasRole('student')) return redirect()->route('e-learning');

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(['email' => 'Invalid email or password.'])
            ->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        // ✅ logout removes session + remember cookie too
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function ResetPass()
    {
        return view('Auth.reset_pass');
    }

    public function ChoosePass()
    {
        return view('Auth.choose_pass');
    }
}
