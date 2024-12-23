<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            // Alihkan pengguna ke path yang sesuai
            return redirect($this->redirectPath());
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function redirectPath()
    {
        $user = auth()->user();
    
        if ($user) {
            $roleName = $user->role; // Ambil langsung nilai role dari kolom role
    
            if ($roleName == 'admin') {
                return '/dashboard'; // Ganti dengan path dashboard Anda
            }
        }
    
        return '/'; // Path default (home)
    }
    
}