<?php

namespace App\Wizards\Submission;

use Arcanist\Action\WizardAction;
use Arcanist\Action\ActionResult;

use App\Models\Rating;
use App\Models\Submission;
use App\Models\Verification;
use App\Models\Parameter;
use App\Models\ParameterTarget;

class SubmissionAction extends WizardAction
{
    public function execute($payload): ActionResult
    {
    	$rating = Rating::findOrFail($payload['rating']);
    	$parameter = Parameter::findOrFail($payload['parameter']);
    	$parameterTarget = ParameterTarget::findOrFail($payload['target']);

    	$submission = Submission::create([
    		'user_id' => auth()->user()->id,
    		'rating_id' => $rating->id,
    		'parameter_id' => $parameter->id
    	]);

    	$submission->save();

    	$verifiers = $rating->verifiers()->where('parameter_target_id', $parameterTarget->id)->get();

    	foreach ($verifiers as $verifier) {
    		Verification::create([
    			'verifier_id' => $verifier->id,
    			'submission_id' => $submission->id,
    			'status' => 'not considered'//Verification::NOT_VIEWED
    		])->save();
    	}

        return $this->success(['submission' => $submission->id]);
    }
}