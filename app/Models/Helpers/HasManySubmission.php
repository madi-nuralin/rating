<?php

namespace App\Models\Helpers;

use App\Models\Submission;

trait HasManySubmission
{
	public function submissions()
	{
    	return $this->hasMany(Submission::class);
    }
}