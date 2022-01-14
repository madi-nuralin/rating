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
    public string $title = 'Select Parameter';

    public string $slug = 'select-parameter';

    public function viewData(Request $request): array
    {
        //return $this->withFormData();
        //$this->data(string $key, mixed $default = null)

        $rating = Rating::findOrFail($this->data('rating'));

        if (! auth()->user()->ratings->contains($rating) ) {
            return redirect(404);
        }

        return [
            'parameters' => $rating->parameters->map(function($parameter) {
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