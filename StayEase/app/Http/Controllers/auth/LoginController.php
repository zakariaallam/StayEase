<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Role;
class LoginController extends Controller
{
    /**

Handle an authentication attempt.*/
    public function __invoke(Request $request): RedirectResponse
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required'],]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $role = Role::where('id',$user->role_id)->first();
            $request->session()->regenerate();
            if ($role->role == "admin") {
                return redirect()->intended(route('admin'));
            } else if ($role->role == "manager") {
                return redirect()->intended(route('hotels.index'));
            } else {
                return redirect()->route('home');
            }

        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
