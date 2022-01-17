<?php

namespace App\Wizards\Submission\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Illuminate\Http\Request;

use App\Models\Rating;
use App\Models\Parameter;
use App\Models\ParameterTarget;

class SelectParameterStep extends WizardStep
{
    public string $title = 'Выбрать параметр';

    public string $slug = 'select-parameter';

    public function viewData(Request $request): array
    {
        //return $this->withFormData();
        //$this->data(string $key, mixed $default = null)

        $rating = Rating::findOrFail($this->data('rating'));
        $parameterTarget = ParameterTarget::findOrFail($this->data('target'));

        if (! auth()->user()->ratings->contains($rating) ) {
            return redirect(404);
        }

        return [
            'parameters' => collect($rating->parameters()->where('parameter_target_id', $parameterTarget->id)->get())->map(function($parameter) {
                return $parameter->toArray();
            })
        ];
    }

    public function fields(): array
    {
        return [
            Field::make('parameter')
                ->rules(['required', 'numeric']),
        ];
    }
}