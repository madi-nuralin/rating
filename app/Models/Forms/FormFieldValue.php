<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

class FormFieldValue extends Model
{
    use HasFactory, SettingHelper;

    protected $table = 'form_field_values';

    public function settings() {
    	return $this->hasMany(FormFieldValueSetting::class);
    }

    public function field() {
    	return $this->belongsTo(FormField::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getField() {
    	return $this->field;
    }

    public function setField($field) {
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
