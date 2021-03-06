<?php

namespace App\Wizards\Submission\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Arcanist\StepResult;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Rating;
use App\Models\Parameter;
use App\Models\ParameterTarget;
use App\Models\Forms\FormField;

class FormFillingStep extends WizardStep
{
    # TODO: Надо разобраться где хранится тип поля 'file' и подумать как его отобразить
    public string $title = 'pages.wizards.submission.steps.formFillingStep.title';

    public string $slug = 'form-filling';

    public function viewData(Request $request): array
    {
        //return $this->withFormData();
        //$this->data(string $key, mixed $default = null)

        $rating = Rating::findOrFail($this->data('rating'));
        $parameter = Parameter::findOrFail($this->data('parameter'));
        $form = $rating->parameterForm($parameter);

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
        } else {
            $parameter = Parameter::findOrFail(null);
        }

        $rating = Rating::findOrFail($this->data('rating'));
        $form = $rating->parameterForm($parameter);

        return $form && $form->fields ? $form->fields->map(function($field) {
            if ($field->getType() == FormField::FILE) {
                return Field::make("field{$field->id}")
                        ->rules($field->rules())
                        ->transform(function (UploadedFile $file) {
                            return $file->storeAs('form-files', $file->getClientOriginalName(), 'public');
                        });
            } else {
                return Field::make("field{$field->id}")
                        ->rules($field->rules());
            }
        })->toArray() : [];
    }
}
