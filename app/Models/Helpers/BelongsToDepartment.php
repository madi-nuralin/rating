<?php

namespace App\Models\Helpers;

use App\Models\Department;

trait BelongsToDepartment
{
	public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment(Department $department)
    {
    	$this->department()->associate($department);
    }
}