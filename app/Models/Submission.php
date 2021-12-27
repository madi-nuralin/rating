<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory,
    	Helpers\Id;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'rating_id',
        'parameter_version_id',
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function rating() {
    	return $this->belongsTo(Rating::class);
    }

    public function parameterVersion() {
    	return $this->belongsTo(ParameterVersion::class);
    }

    public function submissionProlongations() {
    	return $this->hasMany(SubmissionProlongation::class);
    }

    public function setUser(User $user) {
    	$this->user()->associate($user);
    }

    public function setRating(Rating $rating) {
    	$this->rating()->associate($rating);
    }

    public function setParameterVersion(ParameterVersion $parameterVersion) {
    	$this->parameterVersion->associate($parameterVersion);
    }

    public setSubmissionProlongations() {
    	// TODO: 
    }

    public function getUser() {
    	return $this->user;
    }

    public function getRating() {
    	return $this->rating;
    }

    public function getParameterVersion() {
    	return $this->parameterVersion;
    }

    public getSubmissionProlongations() {
    	// TODO: 
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	]
    }
}
