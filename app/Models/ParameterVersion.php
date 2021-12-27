<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterVersion extends Model
{
    use HasFactory,
    	Helpers\HasId,
    	Helpers\HasName,
    	Helpers\HasDescription;

    public function parameter() {
    	return $this->belongsTo(Parameter::class);
    }

    public function setParameter(Parameter $parameter) {
    	$this->parameter->associate($parameter);
    }

    public function getParameter() {
    	return $this->parameter;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
            'description' => $this->getDescription(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	]
    }
}
