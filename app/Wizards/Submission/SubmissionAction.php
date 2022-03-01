<?php

namespace App\Wizards\Submission;

use Arcanist\Action\WizardAction;
use Arcanist\Action\ActionResult;
use Illuminate\Support\Facades\Storage;

use App\Models\Rating;
use App\Models\Submission;
use App\Models\Verification;
use App\Models\Parameter;
use App\Models\ParameterTarget;
use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldOption;
use App\Models\Forms\FormFieldResponce;

use App\Models\VerificationStatus;

class SubmissionAction extends WizardAction
{
    public function execute($payload): ActionResult
    {
    	$rating = Rating::findOrFail($payload['rating']);
    	$parameter = Parameter::findOrFail($payload['parameter']);
    	$parameterTarget = ParameterTarget::findOrFail($payload['parameter_target']);

    	$submission = Submission::create([
    		'user_id' => auth()->user()->id,
    		'rating_id' => $rating->id,
    		'parameter_id' => $parameter->id
    	]);

        $submission->save();

        if ($form = $rating->parameterForm($parameter)) {
            foreach ($form->fields as $formField) {
                $submission->createFormFieldResponce($formField, $payload["field{$formField->id}"]);
            }
            $submission->updateScoreByFormFieldResponces();
        }

    	$submission->save();

    	$verifiers = $rating->verifiers()->where('parameter_target_id', $parameterTarget->id)->get();

    	foreach ($verifiers as $verifier) {
    		Verification::create([
    			'verifier_id' => $verifier->id,
    			'submission_id' => $submission->id,
    			'verification_status_id' => VerificationStatus::firstWhere('context', 'unreviewed')->id
    		])->save();
    	}

        return $this->success(['submission' => $submission->id]);
    }
}