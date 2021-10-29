<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

class Form extends Model
{
    use HasFactory, SettingHelper;

    protected $table = 'forms';

    public function settings() {
    	return $this->hasMany(FormSetting::class);
    }

    public function fields() {
    	return $this->hasMany(FormField::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getFields() {
    	return $this->fields->map(function($field) {
    		return $field->toArray();
    	});
    }

    public function setFields($fields) {
    	//
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
