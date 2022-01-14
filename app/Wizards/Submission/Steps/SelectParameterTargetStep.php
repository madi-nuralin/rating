<?php

namespace App\Wizards\Submission\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Illuminate\Http\Request;

use App\Models\Rating;
use App\Models\Parameter;
use App\Models\ParameterTarget;

class SelectParameterTargetStep extends WizardStep
{
    public string $title = 'Select Parameter Target';

    public string $slug = 'select-parameter-target';

    public function viewData(Request $request): array
    {
        $input = $request->all();

        $user = auth()->user();
        $rating = Rating::findOrFail($input['rating']);

        return [
            'rating' => array_merge(
                $rating->toArray(), [
                    'targets' => collect(ParameterTarget::whereHas(
                        'parameters', function($q) use ($rating) {
                            $q->whereIn('id', $rating->parameters()->pluck('parameters.id'));
                        })->get())->map(function($parameterTarget) use ($rating, $user) {
                            return $parameterTarget->toArray();
                        }
                    )
                ]
            )
        ];
    }

    public function fields(): array
    {
        return [
            Field::make('target')
               ->rules(['required', 'numeric']),
            Field::make('rating')
               ->rules(['required', 'numeric']),
        ];
    }
}