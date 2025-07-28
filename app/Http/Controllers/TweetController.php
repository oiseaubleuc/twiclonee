<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;

class TweetController extends Controller
{


    public function index()
    {
        $tweets = Tweet::latest()->get();
        return view('tweets.index', compact('tweets'));
    }


    public function userTweets(User $user)
    {
        $tweets = $user->tweets()->latest()->get();
        return view('tweets.index', compact('tweets', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:255',
        ]);

        $request->user()->tweets()->create([
            'body' => $request->body,
        ]);

        return redirect()->route('home');
    }
}
