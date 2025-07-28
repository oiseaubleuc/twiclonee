<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }
// In Tweet.php
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

}
