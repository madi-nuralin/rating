<?php

namespace App\Models\Helpers;

use App\Models\User;

trait BelongsToUser
{
	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
    	$this->user()->associate($user);
    }
}