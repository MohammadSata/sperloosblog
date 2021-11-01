<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        $users = User::withCount('posts')->paginate();

        return view('website.auth.login', compact('users'));
    }

    public function loginAsUser(User $user): \Illuminate\Http\RedirectResponse
    {
        \Auth::loginUsingId($user->id);

        return redirect()->route('admin.dashboard');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
