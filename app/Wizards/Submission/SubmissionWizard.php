<?php

namespace App\Wizards\Submission;

use Arcanist\AbstractWizard;
use Illuminate\Http\Request;

use App\Wizards\Submission\Steps\SelectParameterStep;
use App\Wizards\Submission\Steps\SelectParameterTargetStep;

use App\Models\Rating;
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
}