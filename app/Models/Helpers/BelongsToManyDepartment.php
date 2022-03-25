<?php

namespace App\Models\Helpers;

use App\Models\Department;

trait BelongsToManyDepartment
{
	public function departments()
	{
    	return $this->belongsToMany(Department::class);
    }

    public function setDepartments($departments)
    {
    	if (is_null($departments) || empty($departments)) {
            $this->departments()->detach();
            return;
        }

    	$this->departments()->sync($departments);
    }

    public function addDepartments($departments)
    {
    	if (is_null($departments) || is_empty($departments)) {
            return;
        }

    	$this->departments()->attach(
    		array_diff($departments, $this->departments()->pluck('departments.id'))
    	);	
    }

    public function addDepartment(Department $department)
    {
		$this->addDepartments(array($department->id));
    }

    public function deleteDepartments($departments)
    {
    	$this->departments()->detach($departments);
    }

    public function deleteDepartment(Department $department)
    {
    	$this->deleteDepartments(array($department->id));
    }
}