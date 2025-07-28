<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggle(User $user)
    {
        $me = Auth::user();

        if ($me->isFollowing($user)) {
            $me->following()->detach($user);
        } else {
            $me->following()->attach($user);
        }

        return back();
    }
}
