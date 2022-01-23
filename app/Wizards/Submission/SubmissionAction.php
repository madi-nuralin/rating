<?php

namespace App\Wizards\Submission;

use Arcanist\Action\WizardAction;
use Arcanist\Action\ActionResult;

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
    	$parameterTarget = ParameterTarget::findOrFail($payload['target']);

    	$submission = Submission::create([
    		'user_id' => auth()->user()->id,
    		'rating_id' => $rating->id,
    		'parameter_id' => $parameter->id
    	]);

        $form = $parameter->activeForm;
        if ($form) {
            foreach ($form->fields as $formField) {

                switch ($formField->getType()) {
                    case FormField::MULTISELECT:
                        $values = $payload["field{$formField->id}"] ?? [];
                        foreach ($values as $value) {
                            $formFieldResponce = $formField->createResponce();
                            $formFieldResponce->setValue($value);
                        }
                        break;
                        
                    case FormField::FILE:
                        break;

                    default:
                        $value = $payload["field{$formField->id}"];
                        $formFieldResponce = $formField->createResponce();
                        error_log($formField->getLabel());
                        $formFieldResponce->setValue($value);
                        break;
                }
            }
        }

    	$submission->save();

    	$verifiers = $rating->verifiers()->where('parameter_target_id', $parameterTarget->id)->get();

    	foreach ($verifiers as $verifier) {
    		Verification::create([
    			'verifier_id' => $verifier->id,
    			'submission_id' => $submission->id,
    			'verification_status_id' => VerificationStatus::firstWhere('context', 'n/r')->id
    		])->save();
    	}

        return $this->success(['submission' => $submission->id]);
    }
}