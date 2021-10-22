<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, Helpers\SettingHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'context',
    ];

    public function settings() {
    	return $this->hasMany(RoleSetting::class);
    }

    public function users() {
    	return $this->belongsToMany(User::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getContext() {
        return $this->context;
    }

    public function setContext($context) {
        $this->context = $context;
    }

    public function getName($locale=null) {
    	return $this->getSettingValue(
    		isset($locale) ? $locale : app()->currentLocale(),
    		'string',
    		'name'
    	);
    }

    public function setName($name, $locale=null) {
    	$this->updateSettingValue(
    		isset($locale) ? $locale : app()->currentLocale(),
    		'string',
    		'name',
    		$name
    	);
    }

    public function getDescription($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description'
        );
    }

    public function setDescription($description, $locale=null) {
        return $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description',
            $description
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
            'context' => $this->getContext(),
    		'name' => $this->getName(),
            'description' => $this->getDescription(),
    		'created_at' => $this->createdAt(),
           	'updated_at' => $this->updatedAt(),
    	];
    }
}
