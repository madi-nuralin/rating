<?php

namespace App\Models\Helpers;

use App\Models\Verifier;

trait HasManyVerifier
{
	public function verifiers()
	{
    	return $this->hasMany(Verifier::class);
    }
}