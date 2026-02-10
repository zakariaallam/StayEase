<?php

namespace App\Http\Controllers\auth;
use App\Models\Role;
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
            'password' => ['required']
        ]);
        $role_id = Role::where('role','client')->first()->id;
        $userData['role_id'] = $role_id;
        $userData['password'] = bcrypt($userData['password']);
        User::create($userData);
        return redirect()->route('login');
    }
}
