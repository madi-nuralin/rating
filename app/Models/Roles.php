<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory, Helpers\SettingHelper;

    public function settings() {
    	return $this->hasMany(RoleSetting::class);
    }

    public function users() {
    	return $this->belongsTo(User::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getName() {
    	return $this->getSettingValue(
    		app()->currentLocale(),
    		'string',
    		'name'
    	);
    }

    public function setName($name) {
    	$this->updateSettingValue(
    		app()->currentLocale(),
    		'string',
    		'name',
    		$name
    	);
    }

    public function getUsers() {
    	return $this->users->map(function($user) {
    		return $user->toArray();
    	});
    }

    public function createdAt() {
        return $this->created_at;
    }

    public function updatedAt() {
        return $this->updated_at;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
    		'createdAt' => $this->createdAt(),
            'updatedAt' => $this->updatedAt(),
    	]
    }
}
