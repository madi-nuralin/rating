<?php

namespace App\Models\Helpers;

use App\Models\Verification;

trait HasManyVerification
{
	public function verifications()
	{
    	return $this->hasMany(Verification::class);
    }
}