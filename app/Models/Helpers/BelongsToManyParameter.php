<?php

namespace App\Models\Helpers;

use App\Models\Parameter;

trait BelongsToManyParameter
{
	public function parameters()
	{
    	return $this->belongsToMany(Parameter::class);
    }

    public function setParameters($parameters)
    {
    	if (is_null($parameters) || empty($parameters)) {
            $this->parameters()->detach();
            return;
        }

    	$this->parameters()->sync($parameters);
    }

    public function addParameters($parameters)
    {
    	if (is_null($parameters) || empty($parameters)) {
            return;
        }

    	$this->parameters()->attach(
    		array_diff($parameters, $this->parameters()->pluck('parameters.id')->toArray())
    	);	
    }

    public function addParameter(Parameter $parameter)
    {
		$this->addParameters(array($parameter->id));
    }

    public function deleteParameters($parameters)
    {
    	$this->parameters()->detach($parameters);
    }

    public function deleteParameter(Parameter $parameter)
    {
    	$this->deleteParameters(array($parameter->id));
    }
}