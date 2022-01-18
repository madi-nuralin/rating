<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Helpers\HasId;
use App\Models\Helpers\HasLabel;
use App\Models\Helpers\HasDescription;

class FormField extends Model
{
    use HasFactory,
        HasId,
        HasLabel,
        HasDescription;

    protected $table = 'form_fields';

    const TEXT = 'text';
    const TEXTAREA = 'textarea';
    const EMAIL = 'email';
    const URL = 'url';
    const SELECT = 'select';
    const MULTISELECT = 'multiselect';
    const FILE = 'file';
    const MATH = 'math';
    const TIME = 'time';
    const DATE = 'date';
    const DATETIME = 'math';
    const DATETIME_LOCAL = 'datetime-local';

    const SCORING_POLICY_DISABLED = 'scoring_policy_disabled';
    const SCORING_POLICY_DEFAULT = 'scoring_policy_default';
    const SCORING_POLICY_USE_OPTIONS = 'scoring_policy_use_options';
    const SCORING_POLICY_USE_MATH = 'scoring_policy_use_math';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
        'type',
        'scoring_policy',
        'score'
    ];

    public function settings() {
    	return $this->hasMany(FormFieldSetting::class);
    }

    public function form() {
    	return $this->belongsTo(Form::class);
    }

    public function options() {
    	return $this->hasMany(FormFieldOption::class);
    }

    public function responces() {
    	return $this->hasMany(FormFieldResponce::class);
    }

    public function getType() {
    	return $this->type;
    }

    public function setType($type) {
    	$this->type = $type;
    }

    public function getScoringPolicy() {
        return $this->scoring_policy;
    }

    public function setScoringPolicy($scoringPolicy) {
        $this->scoring_policy = $scoringPolicy;
    }

    public function getScore() {
        return $this->score();
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function getForm() {
    	return $this->form;
    }

    public function setForm($form) {
    	$this->form()->associate($form);
    }

    public function getOptions() {
    	return $this->options;
    }

    public function setOptions($options) {
    	//
    }

    public function getResponces() {
    	return $this->responces;
    }

    public function setResponces($responces) {
    	//
    }

    public function toArray() {
    	return [
            'id' => $this->getId(),
            'label' => $this->getLabel(),
            'description' => $this->getDescription(),
            'type' => $this->getType(),
            'scoring_policy' => $this->getScoringPolicy(),
            'score' => $this->getScore(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

}
