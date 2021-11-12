<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

class FormField extends Model
{
    use HasFactory, SettingHelper;

    protected $table = 'form_fields';

    const TEXT = 'text';
    const TEXTAREA = 'textarea';
    const SELECT = 'select';
    const MULTISELECT = 'multiselect';
    const FILE = 'file';
    const FORMULA = 'formula';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
        'type',
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

    public function variables() {
        return $this->hasMany(FormFieldVariable::class);
    }

    public function values() {
    	return $this->hasMany(FormFieldValue::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getType() {
    	return $this->type;
    }

    public function setType($type) {
    	$this->type = $type;
    }

    public function getForm() {
    	return $this->form->toArray();
    }

    public function setForm($form) {
    	$this->form()->associate($form);
    }

    public function getName($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'name'
        );
    }

    public function setName($name, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'name',
            $name
        );
    }

    public function getFormula($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : '',
            'string',
            'formula'
        );
    }

    public function setFormula($formula, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : '',
            'string',
            'formula',
            $formula
        );
    }

    public function getOptions() {
    	return $this->options->map(function($option) {
    		return $option->toArray();
    	});
    }

    public function setOptions($options) {
    	//
    }

    public function getVariables() {
        return $this->variables->map(function($variable) {
            return $variable->toArray();
        });
    }

    public function setVariables($variables) {
        //
    }

    public function getValues() {
    	return $this->values->map(function($value) {
    		return $value->toArray();
    	});
    }

    public function setValues($values) {
    	//
    }

    public function toArray() {
    	return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'type' => $this->getType(),
            'formula' => $this->getFormula(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

}
