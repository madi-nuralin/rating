<?php

namespace App\Models\Helpers;

use App\Models\DepartmentType;

trait BelongsToDepartmentType
{
	public function departmentType()
    {
        return $this->belongsTo(DepartmentType::class);
    }

    public function getDepartmentType()
    {
        return $this->departmentType;
    }

    public function setDepartmentType(DepartmentType $departmentType)
    {
    	$this->departmentType()->associate($departmentType);
    }
}