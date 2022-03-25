<?php

namespace App\Models\Helpers;

use App\Models\Forms\Form;

trait BelongsToManyForm
{
	public function forms()
	{
    	return $this->belongsToMany(Form::class);
    }

    public function setForms($forms)
    {
    	if (is_null($forms) || empty($forms)) {
            $this->forms()->detach();
            return;
        }

    	$this->forms()->sync($forms);
    }

    public function addForms($forms)
    {
    	if (is_null($forms) || is_empty($forms)) {
            return;
        }

    	$this->forms()->attach(
    		array_diff($forms, $this->forms()->pluck('forms.id'))
    	);	
    }

    public function addForm(Form $form)
    {
		$this->addForms(array($form->id));
    }

    public function deleteForms($forms)
    {
    	$this->forms()->detach($forms);
    }

    public function deleteForm(Form $form)
    {
    	$this->deleteForms(array($form->id));
    }
}