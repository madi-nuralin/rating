<?php

namespace App\Models\Helpers;

use App\Models\EmployementType;

trait BelongsToEmployementType
{
	public function employementType()
    {
        return $this->belongsTo(EmployementType::class);
    }

    public function getEmployementType()
    {
        return $this->employementType;
    }

    public function setEmployementType(EmployementType $employementType)
    {
    	$this->employementType()->associate($employementType);
    }
}