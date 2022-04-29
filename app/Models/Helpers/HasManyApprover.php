<?php

namespace App\Models\Helpers;

use App\Models\Approver;

trait HasManyApprover
{
	public function approvers()
	{
    	return $this->hasMany(Approver::class);
    }
}