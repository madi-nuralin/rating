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

    const NUMBER = 'number';
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
        return json_decode($this->validation_rules);
    }

    public function setValidationRules($validationRules) {
        $this->validation_rules = json_encode($validationRules);
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

    public function createResponce() {
        return FormFieldResponce::create([
            'form_field_id' => $this->id
        ]);
    }

    public function rules() {
        $rules = [];
        $validationRules = json_decode($this->validation_rules, true) ?? [];

        // Boolean rules
        foreach (array('required', 'nullable', 'is_integer', 'is_numeric', 'is_string') as $rule) {

            if (array_key_exists($rule, $validationRules)) {
                if ($validationRules[$rule]) {
                    switch ($rule) {
                        case 'is_integer':
                        case 'is_numeric':
                        case 'is_string':
                            array_push($rules, substr($rule, 3)); # removing 'is_'
                            break;
                        
                        default:
                            array_push($rules, $rule);
                            break;
                    }
                }
            }
        }

        // Assignable rules
        foreach (array('min_size', 'max_size', 'file_size', 'mimes', 'date_format', 'email', 'url') as $rule) {
            if (array_key_exists($rule, $validationRules)) {
                switch ($rule) {
                    case 'min_size':
                        array_push($rules, "min:{$validationRules[$rule]}");
                        break;
                    case 'max_size':
                        array_push($rules, "max:{$validationRules[$rule]}");
                        break;
                    case 'file_size':
                        array_push($rules, "max:{$validationRules[$rule]}");
                        break;
                    default:
                        array_push($rules, $rule . ':' . $validationRules[$rule]);
                        break;
                }
            }
        }

        //error_log(json_encode($rules));
            
        return $rules;
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
