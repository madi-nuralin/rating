<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldResponce;

class Submission extends Model
{
    use HasFactory,
    	Helpers\HasId;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'rating_id',
        'parameter_id',
        'score'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function rating() {
    	return $this->belongsTo(Rating::class);
    }

    public function parameter() {
    	return $this->belongsTo(Parameter::class);
    }

    public function submissionProlongations() {
    	return $this->hasMany(SubmissionProlongation::class);
    }

    public function verifications() {
        return $this->hasMany(Verification::class);
    }

    public function formFieldResponces() {
        return $this->belongsToMany(FormFieldResponce::class);
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function setUser(User $user) {
    	$this->user()->associate($user);
    }

    public function setRating(Rating $rating) {
    	$this->rating()->associate($rating);
    }

    public function setParameter(Parameter $parameter) {
    	$this->parameter->associate($parameter);
    }

    public function setSubmissionProlongations() {
    	// 
    }

    public function setFormFieldResponces() {
        //
    }

    public function getScore(): float {
        return $this->score;
    }

    public function getUser() {
    	return $this->user;
    }

    public function getRating() {
    	return $this->rating;
    }

    public function getParameter() {
    	return $this->parameter;
    }

    public function getSubmissionProlongations() {
    	return $this->submissionProlongations;
    }

    public function getFormFieldResponces() {
        return $this->formFieldResponces;
    }

    public function addFormFieldResponce(FormFieldResponce $formFieldResponce) {
        $this->formFieldResponces()->attach($formFieldResponce->id);
    }

    public function deleteFormFieldResponce(FormFieldResponce $formFieldResponce) {
        $this->formFieldResponces()->detach($formFieldResponce->id);
    }

    public function createFormFieldResponce(FormField $formField, $value) {
        $formFieldResponce = $formField->createResponce();
        $formFieldResponce->setValue($value);
        $formFieldResponce->save();
        $this->addFormFieldResponce($formFieldResponce);
        $this->save();

        return $formFieldResponce;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'score' => $this->getScore(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
