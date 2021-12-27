<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory,
    	Helpers\HasId;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'submission_id',
        'verifier_id',
    ];

    public function submission() {
    	return $this->belongsTo(Submission::class);
    }

    public function verifier() {
    	return $this->belongsTo(Verifier::class);
    }

    public function setSubmission(Submission $submission) {
    	$this->submission()->associate($submission);
    }

    public function setVerifier(Verifier $verifier) {
    	$this->verifier()->associate($verifier);
    }

    public function getSubmission() {
    	return $this->submission;
    }

    public function getVerifier() {
    	return $this->verifier;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
