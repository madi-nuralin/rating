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
        'filling_started_at',
        'filling_expired_at',
        'verification_started_at',
        'verification_expired_at',
        'approvement_started_at',
        'approvement_expired_at',
    ];

    public function settings() {
    	return $this->hasMany(RatingSetting::class);
    }

    public function verifiers() {
        return $this->hasMany(Verifier::class);
    }

    public function parameters() {
        return $this->belongsToMany(Parameter::class);
    }

    public function setFillingStartedAt($fillingStartedAt) {
    	$this->filling_started_at = $fillingStartedAt;
    }

    public function setFillingExpiredAt($fillingExpiredAt) {
    	$this->filling_expired_at = $fillingExpiredAt;
    }

    public function setVerificationStartedAt($verificationStartedAt) {
    	$this->verification_started_at = $verificationStartedAt;
    }

    public function setVerificationExpiredAt($verificationExpiredAt) {
    	$this->verification_expired_at = $verificationExpiredAt;
    }

    public function setApprovementStartedAt($approvementStartedAt) {
    	$this->approvement_started_at = $approvementStartedAt;
    }

    public function setApprovementExpiredAt($approvementExpiredAt) {
    	$this->approvement_expired_at = $approvementExpiredAt;
    }

    public function setParameters($parameters) {
        if (is_null($parameters) || empty($parameters)) {
            $this->parameters()->detach();
            return;
        }

        if ($this->parameters()) {
            $this->parameters()->detach(
                array_diff($this->parameters()->pluck('parameters.id')->toArray(), $parameters));
            $this->parameters()->attach(
                array_diff($parameters, $this->parameters()->pluck('parameters.id')->toArray()));
        } else {
            $this->parameters()->attach($parameters);
        }
    }

    public function getFillingStartedAt() {
    	return $this->filling_started_at;
    }

    public function getFillingExpiredAt() {
    	return $this->filling_expired_at;
    }

    public function getVerificationStartedAt() {
    	return $this->verification_started_at;
    }

    public function getVerificationExpiredAt() {
    	return $this->verification_expired_at;
    }

    public function getApprovementStartedAt() {
    	return $this->approvement_started_at;
    }

    public function getApprovementExpiredAt() {
    	return $this->approvement_expired_at;
    }

    public function getParameters() {
        return $this->parameters;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
    		'description' => $this->getDescription(),
    		'filling_started_at' => $this->getFillingStartedAt(),
    		'filling_expired_at' => $this->getFillingExpiredAt(),
    		'verification_started_at' => $this->getVerificationStartedAt(),
    		'verification_expired_at' => $this->getVerificationExpiredAt(),
    		'approvement_started_at' => $this->getApprovementStartedAt(),
    		'approvement_expired_at' => $this->getApprovementExpiredAt(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
