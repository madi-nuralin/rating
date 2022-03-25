<?php

namespace App\Models\Helpers;

use App\Models\Verifier;

trait BelongsToVerifier
{
	public function verifier()
    {
        return $this->belongsTo(Verifier::class);
    }

    public function getVerifier()
    {
        return $this->verifier;
    }

    public function setVerifier(Verifier $verifier)
    {
    	$this->verifier()->associate($verifier);
    }
}