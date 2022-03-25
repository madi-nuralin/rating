<?php

namespace App\Models\Helpers;

use App\Models\Parameter;

trait HasManyParameter
{
	public function parameters()
	{
    	return $this->hasMany(Parameter::class);
    }
}