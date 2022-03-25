<?php

namespace App\Models\Helpers;

use App\Models\ParameterTarget;

trait BelongsToParameterTarget
{
	public function parameterTarget()
    {
        return $this->belongsTo(ParameterTarget::class);
    }

    public function getParameterTarget()
    {
        return $this->parameterTarget;
    }

    public function setParameterTarget(ParameterTarget $parameterTarget)
    {
    	$this->parameterTarget()->associate($parameterTarget);
    }
}