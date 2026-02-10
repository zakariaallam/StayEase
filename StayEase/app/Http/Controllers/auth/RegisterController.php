<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email'],
            'password' => ['required'],
            'role' => ['required']
        ]);
        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        // $request->session()->regenerate();
        // Auth::login($user);
        return redirect()->route('login');
    }
}
