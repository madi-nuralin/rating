<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory,
    	Helpers\HasId,
    	Helpers\HasName,
    	Helpers\HasDescription;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'submission_started_at',
        'submission_finished_at',
        'verification_started_at',
        'verification_finished_at',
        'approvement_started_at',
        'approvement_finished_at',
    ];

    public function settings() {
    	return $this->hasMany(RatingSetting::class);
    }

    public function setSubmissionStartedAt($submissionStartedAt) {
    	$this->submission_started_at = $submissionStartedAt;
    }

    public function setSubmissionFinishedAt($submissionFinishedAt) {
    	$this->submission_finished_at = $submissionFinishedAt;
    }

    public function setVerificationStartedAt($verificationStartedAt) {
    	$this->verification_started_at = $verificationStartedAt;
    }

    public function setVerificationFinishedAt($verificationFinishedAt) {
    	$this->verification_finished_at = $verificationFinishedAt;
    }

    public function setApprovementStartedAt($approvementStartedAt) {
    	$this->approvement_started_at = $approvementStartedAt;
    }

    public function setApprovementFinishedAt($approvementFinishedAt) {
    	$this->approvement_finished_at = $approvementFinishedAt;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
    		'description' => $this->getDescription(),
    		'submission_started_at' => $this->submission_started_at,
    		'submission_finished_at' => $this->submission_finished_at,
    		'verification_started_at' => $this->verification_started_at,
    		'verification_finished_at' => $this->verification_finished_at,
    		'approvement_started_at' => $this->approvement_started_at,
    		'approvement_finished_at' => $this->approvement_finished_at,
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
