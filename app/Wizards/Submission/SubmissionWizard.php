<?php

namespace App\Wizards\Submission;

use Arcanist\AbstractWizard;
use Arcanist\Action\ActionResult;
use Illuminate\Http\Request;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

use App\Wizards\Submission\Steps\SelectParameterStep;
use App\Wizards\Submission\Steps\SelectParameterTargetStep;

use App\Models\Rating;
use App\Models\Submission;
use App\Models\Parameter;
use App\Models\ParameterTarget;

class SubmissionWizard extends AbstractWizard
{
    public static string $title = 'Submission';

    public static string $slug = 'submission';

    public string $onCompleteAction = SubmissionAction::class;

    protected array $steps = [
        SelectParameterTargetStep::class,
        SelectParameterStep::class,
    ];

    public static function middleware(): array
    {
        return ['auth', 'verified'];
    }

    public function sharedData(Request $request): array
    {
        return [
            //
        ];
    }

    protected function onAfterComplete(ActionResult $result): Response | Responsable | Renderable
    {
        $submission = Submission::findOrFail($result->get('submission'));

        session()->flash('flash.banner', [
            'components.banner.resource.created', [
                'href' => route('submission.show', ['submission' => $submission->id])
            ]
        ]);
        session()->flash('flash.bannerStyle', 'success');

        return Inertia::location(route('submission.index', ['rating' => $submission->rating->id]));
    }
}