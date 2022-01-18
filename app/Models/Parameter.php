<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Forms\Form;

class Parameter extends Model
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
        'parameter_target_id',
        'form_id',
        'score',
    ];

    public function settings() {
        return $this->hasMany(ParameterSetting::class);
    }

    public function parameterTarget() {
    	return $this->belongsTo(ParameterTarget::class);
    }

    public function ratings() {
        return $this->belongsToMany(Rating::class);
    }

    public function forms() {
        return $this->belongsToMany(Form::class);
    }

    public function setParameterTarget(ParameterTarget $parameterTarget) {
    	$this->parameterTarget()->associate($parameterTarget);
    }

    public function setForms(Form $form) {
        //
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function getParameterTarget() {
    	return $this->parameterTarget;
    }

    public function getForms() {
        return $this->forms;
    }

    public function getScore() {
        return $this->score;
    }

    public function addForm(Form $form) {
        $this->forms()->attach($form->id);
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'score' => $this->getScore(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
