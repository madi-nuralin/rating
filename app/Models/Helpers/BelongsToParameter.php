<?php

namespace App\Models\Helpers;

use App\Models\Parameter;

trait BelongsToParameter
{
	public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }

    public function getParameter()
    {
        return $this->parameter;
    }

    public function setParameter(Parameter $parameter)
    {
    	$this->parameter()->associate($parameter);
    }
}