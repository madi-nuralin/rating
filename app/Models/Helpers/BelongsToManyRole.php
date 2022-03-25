<?php

namespace App\Models\Helpers;

use App\Models\Role;

trait BelongsToManyRole
{
	public function roles()
	{
    	return $this->belongsToMany(Role::class);
    }

    public function setRoles($roles)
    {
    	if (is_null($roles) || empty($roles)) {
            $this->roles()->detach();
            return;
        }

    	$this->roles()->sync($roles);
    }

    public function addRoles($roles)
    {
    	if (is_null($roles) || empty($roles)) {
            return;
        }

    	$this->roles()->attach(
    		array_diff($roles, $this->roles()->pluck('roles.id')->toArray())
    	);	
    }

    public function addRole(Role $role)
    {
		$this->addRoles(array($role->id));
    }

    public function deleteRoles($roles)
    {
    	$this->roles()->detach($roles);
    }

    public function deleteRole(Role $role)
    {
    	$this->deleteRoles(array($role->id));
    }
}