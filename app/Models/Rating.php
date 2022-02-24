<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use App\Models\Forms\Form;

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
        'submission_begin_time_at',
        'submission_end_time_at',
        'verification_begin_time_at',
        'verification_end_time_at',
        'approvement_begin_time_at',
        'approvement_end_time_at',
    ];

    public function settings() {
    	return $this->hasMany(RatingSetting::class);
    }

    public function verifiers() {
        return $this->hasMany(Verifier::class);
    }

    public function parameters() {
        return $this->belongsToMany(Parameter::class)->withPivot('form_id');
    }

    public function parameterTargets() {
        $parameterTargets = collect(
            DB::table('parameters')
                ->select('parameter_target_id')
                ->whereIn('id', $this->parameters()->pluck('parameters.id'))
                ->groupBy('parameter_target_id')
                ->get()
                ->pluck('parameter_target_id')
        );

        if (is_null($parameterTargets)) {
            return null;
        }

        return $parameterTargets->map(function($parameterTarget) {
            return ParameterTarget::find($parameterTarget);
        });
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function parameterForm($parameter) {
        return Form::find(
            $this->parameters()
                 ->firstWhere('parameter_id', $parameter->id)
                 ->pivot
                 ->form_id
        );
    }

    public function setSubmissionBeginTimeAt($timeAt) {
    	$this->submission_begin_time_at = $timeAt;
    }

    public function setSubmissionEndTimeAt($timeAt) {
    	$this->submission_end_time_at = $timeAt;
    }

    public function setVerificationBeginTimeAt($timeAt) {
    	$this->verification_begin_time_at = $timeAt;
    }

    public function setVerificationEndTimeAt($timeAt) {
    	$this->verification_end_time_at = $timeAt;
    }

    public function setApprovementBeginTimeAt($timeAt) {
    	$this->approvement_begin_time_at = $timeAt;
    }

    public function setApprovementEndTimeAt($timeAt) {
    	$this->approvement_end_time_at = $timeAt;
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

    public function addParameter(Parameter $parameter) {
        if ($this->parameters()) {
            $this->parameters()->detach(
                array($parameter->id)
            );
        }

        $this->parameters()->attach($parameter->id);
    }

    public function addParameterWithForm(Parameter $parameter, Form $form) {
        if ($this->parameters()) {
            $this->parameters()->detach(
                array($parameter->id)
            );
        }

        $this->parameters()->attach(array($parameter->id => array('form_id' => $form->id)));
    }

    public function deleteParameter(Parameter $parameter) {
        if ($this->parameters()) {
            $this->parameters()->detach(
                array($parameter->id)
            );
        }
    }

    public function setUsers($users) {
        if (is_null($users) || empty($users)) {
            $this->users()->detach();
            return;
        }

        if ($this->users()) {
            $this->users()->detach(
                array_diff($this->users()->pluck('users.id')->toArray(), $users));
            $this->users()->attach(
                array_diff($users, $this->users()->pluck('users.id')->toArray()));
        } else {
            $this->users()->attach($users);
        }
    }

    public function getSubmissionBeginTimeAt() {
    	return date('Y-m-d\Th:i:s', strtotime($this->submission_begin_time_at));
    }

    public function getSubmissionEndTimeAt() {
    	return date('Y-m-d\Th:i:s', strtotime($this->submission_end_time_at));
    }

    public function getVerificationBeginTimeAt() {
    	return date('Y-m-d\Th:i:s', strtotime($this->verification_begin_time_at));
    }

    public function getVerificationEndTimeAt() {
    	return date('Y-m-d\Th:i:s', strtotime($this->verification_end_time_at));
    }

    public function getApprovementBeginTimeAt() {
    	return date('Y-m-d\Th:i:s', strtotime($this->approvement_begin_time_at));
    }

    public function getApprovementEndTimeAt() {
    	return date('Y-m-d\Th:i:s', strtotime($this->approvement_end_time_at));
    }

    public function getParameters() {
        return $this->parameters;
    }

    public function getUsers() {
        return $this->users;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
    		'description' => $this->getDescription(),
    		'submission_begin_time_at' => $this->getSubmissionBeginTimeAt(),
    		'submission_end_time_at' => $this->getSubmissionEndTimeAt(),
    		'verification_begin_time_at' => $this->getVerificationBeginTimeAt(),
    		'verification_end_time_at' => $this->getVerificationEndTimeAt(),
    		'approvement_begin_time_at' => $this->getApprovementBeginTimeAt(),
    		'approvement_end_time_at' => $this->getApprovementEndTimeAt(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
