<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $tweets = $user->tweets()->latest()->with('user')->get();

        return view('profile.show', compact('user', 'tweets'));
    }
}
