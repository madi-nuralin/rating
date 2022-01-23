<?php

namespace App\Wizards\Submission\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Arcanist\StepResult;
use Illuminate\Http\Request;

use App\Models\Rating;
use App\Models\Parameter;
use App\Models\ParameterTarget;

class FormFillingStep extends WizardStep
{
    public string $title = 'Заполните форму';

    public string $slug = 'form-filling';

    public function viewData(Request $request): array
    {
        //return $this->withFormData();
        //$this->data(string $key, mixed $default = null)

        $parameter = Parameter::findOrFail($this->data('parameter'));
        $form = $parameter->activeForm;

        return [
            'form' => $form ? array_merge(
                $form->toArray(), [
                    'fields' => $form->fields ? $form->fields->map(function($field) {
                        return array_merge(
                            $field->toArray(), [
                                'options' => $field->options ? $field->options->map(function($option) {
                                    return $option->toArray();
                                }) : []
                            ]
                        );
                    }) : []
                ]
            ) : null
        ];
    }

    public function fields(): array
    {
        if (request()->input('parameter')) {
            $parameter = Parameter::findOrFail(request()->input('parameter'));
        } else if ($this->data('parameter')) {
            $parameter = Parameter::findOrFail($this->data('parameter'));
        }

        $form = $parameter->activeForm;

        return $form && $form->fields ? $form->fields->map(function($field) {
            return Field::make("field{$field->id}")
                        ->rules($field->rules());
        })->toArray() : [];
    }
}