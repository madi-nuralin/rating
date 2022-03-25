<?php

namespace App\Models\Helpers;

use App\Models\Submission;

trait BelongsToSubmission
{
	public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function getSubmission()
    {
        return $this->submission;
    }

    public function setSubmission(Submission $submission)
    {
    	$this->submission()->associate($submission);
    }
}