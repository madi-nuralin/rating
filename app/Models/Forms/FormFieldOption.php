<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

class FormFieldOption extends Model
{
    use HasFactory, SettingHelper;

    protected $table = 'form_field_options';

    public function settings() {
    	return $this->hasMany(FormFieldOptionSetting::class);
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
