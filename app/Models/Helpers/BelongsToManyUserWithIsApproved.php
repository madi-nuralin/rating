<?php

namespace App\Models\Helpers;

use App\Models\User;

trait BelongsToManyUserWithIsApproved
{
	public function users()
	{
    	return $this->belongsToMany(User::class)->withPivot('is_approved');
    }

    public function userIsApproved($user): bool {
        return $this->users()
             ->firstWhere('user_id', $user->id)
             ->pivot
             ->is_approved;
    }

    public function approveUser(User $user) {
        $this->users()
             ->updateExistingPivot($user, array('is_approved' => true), true);
    }

    public function setUsers($users)
    {
    	if (is_null($users) || empty($users)) {
            $this->users()->detach();
            return;
        }

    	$this->users()->sync($users);
    }

    public function addUsers($users)
    {
    	if (is_null($users) || empty($users)) {
            return;
        }

    	$this->users()->attach(
    		array_diff($users, $this->users()->pluck('users.id')->toArray())
    	);	
    }

    public function addUser(User $user)
    {
		$this->addUsers(array($user->id));
    }

    public function deleteUsers($users)
    {
    	$this->users()->detach($users);
    }

    public function deleteUser(User $user)
    {
    	$this->deleteUsers(array($user->id));
    }
}