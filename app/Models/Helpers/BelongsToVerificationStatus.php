<?php

namespace App\Models\Helpers;

use App\Models\VerificationStatus;

trait BelongsToVerificationStatus
{
	public function verificationStatus()
    {
        return $this->belongsTo(VerificationStatus::class);
    }

    public function getVerificationStatus()
    {
        return $this->verificationStatus;
    }

    public function setVerificationStatus(VerificationStatus $verificationStatus)
    {
    	$this->verificationStatus()->associate($verificationStatus);
    }
}