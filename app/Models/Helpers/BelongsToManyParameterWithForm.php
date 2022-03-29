<?php

namespace App\Models\Helpers;

use App\Models\Parameter;
use App\Models\Forms\Form;

trait BelongsToManyParameterWithForm
{
	public function parameters()
	{
    	return $this->belongsToMany(Parameter::class)->withPivot('form_id');
    }

    public function parameterForm($parameter) {
        return Form::find(
            $this->parameters()
                 ->firstWhere('parameter_id', $parameter->id)
                 ->pivot
                 ->form_id
        );
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

    public function addParameterWithForm(Parameter $parameter, Form $form)
    {
        if ($this->parameters()) {
            $this->parameters()->detach(
                array($parameter->id)
            );
        }

        $this->parameters()->attach(array($parameter->id => array('form_id' => $form->id)));
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