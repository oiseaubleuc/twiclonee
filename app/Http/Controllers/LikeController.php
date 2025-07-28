<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->likes()->create(['user_id' => auth()->id()]);
        return back();
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->likes()->where('user_id', auth()->id())->delete();
        return back();
    }

}
