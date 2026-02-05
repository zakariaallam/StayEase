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
            // 'role_id' => 1
        ]);
        $userData['password'] = bcrypt($userData['password']);
        $userData['role_id'] = 1;
        $user = User::create($userData);
        Auth::login($user);
        return redirect()->route('home');
    }
}
