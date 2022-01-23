<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Helpers\HasId;
use App\Models\Helpers\HasLabel;
use App\Models\Helpers\HasDescription;

use App\Enums\Forms\FormFieldType;

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
    const DATETIME = 'datetime';
    const DATETIME_LOCAL = 'datetime-local';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
        'type',
        'variable'
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

    public function getValidationRules() {
        return $this->validation_rules;
    }

    public function setValidationRules($validationRules) {
        $this->validation_rules = $validationRules;
    }

    public function setVariable($variable) {
        $this->variable = $variable;
    }

    public function getVariable() {
        return $this->variable;
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
            'validation_rules' => $this->getValidationRules(),
            'variable' => $this->getVariable(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

}
