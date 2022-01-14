<?php

namespace App\Wizards\Submission;

use Arcanist\Action\WizardAction;
use Arcanist\Action\ActionResult;

class SubmissionAction extends WizardAction
{
    public function execute($payload): ActionResult
    {
    	error_log('message');
        return $this->success();
    }
}