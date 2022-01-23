<?php

namespace App\Wizards\Submission\Steps;

use Arcanist\Field;
use Arcanist\WizardStep;
use Arcanist\StepResult;
use Illuminate\Http\Request;

use App\Models\Rating;
use App\Models\Parameter;
use App\Models\ParameterTarget;

class SelectParameterTargetStep extends WizardStep
{
    public string $title = 'Выбрать направление деятельности';

    public string $slug = 'select-parameter-target';

    protected function handle(
        Request $request,
        array $payload
    ): StepResult {
        //$request['rating'] = $payload['rating'];

        return $this->success($payload);
    }

    public function viewData(Request $request): array
    {
        $input = $request->all();

        $user = auth()->user();
        
        if (array_key_exists('rating', $input)) {
            $rating = Rating::findOrFail($input['rating']);
        } else {
            $rating =  Rating::findOrFail($this->data('rating'));
        } 

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