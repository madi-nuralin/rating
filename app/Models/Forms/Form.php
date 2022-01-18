<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

use App\Models\Helpers\HasId;
use App\Models\Helpers\HasName;
use App\Models\Helpers\HasDescription;

class Form extends Model
{
    use HasFactory,
        HasId,
        HasName,
        HasDescription;

    protected $table = 'forms';

    public function settings() {
    	return $this->hasMany(FormSetting::class);
    }

    public function parameter() {
        return $this->belongsTo(Parameter::class);
    }

    public function fields() {
    	return $this->hasMany(FormField::class);
    }

    public function getFields() {
    	return $this->fields;
    }

    public function setFields($fields) {
    	//
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
