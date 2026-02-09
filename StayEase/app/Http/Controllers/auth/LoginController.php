<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->intended(route('admin'));
            }
            else if($user->role_id == 3){
                return redirect()->intended(route('gerant'));
            }
            else{
                return redirect()->intended(route('home'));
            }
            
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
