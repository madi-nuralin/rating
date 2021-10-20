<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory, Helpers\SettingHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type',
    ];

    public function settings() {
        return $this->hasMany(RuleSetting::class);
    }

    public function parameters() {
        return $this->belongsToMany(Parameter::class);
    }

    public function options() {
        return $this->hasMany(RuleOption::class);
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

    public function getDescription($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description'
        );
    }

    public function setDescription($description, $locale=null) {
        return $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description',
            $description
        );
    }

    public function getInputId($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_id'
        );
    }

    public function setInputId($inputId, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_id',
            $inputId
        );
    }

    public function getInputType($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_type'
        );
    }

    public function setInputType($inputType, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_type',
            $inputType
        );
    }

    public function getInputLabel($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_label'
        );
    }

    public function setInputLabel($inputLabel, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_label',
            $inputLabel
        );
    }

    public function getInputValidation($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_validation'
        );
    }

    public function setInputValidation($inputValidation, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_validation',
            $inputValidation
        );
    }

    public function getInputExpression($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_expression'
        );
    }

    public function setInputExpression($inputExpression, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_expression',
            $inputExpression
        );
    }

    public function getInputExpressionType($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_expression_type'
        );
    }

    public function setInputExpressionType($inputExpressionType, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'input_expression_type',
            $inputExpressionType
        );
    }

    public function getParameters() {
        return $this->parameters->map(function($parameter) {
            return $parameter->toArray();
        });
    }

    public function getOptions() {
        return $this->options->map(function($option) {
            return $option->toArray();
        });
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'input_id' => $this->getInputId(),
            'input_type' => $this->getInputType(),
            'input_label' => $this->getInputLabel(),
            'input_validation' => $this->getInputValidation(),
            'input_expression' => $this->getInputExpression(),
            'input_expression_type' => $this->getInputExpressionType(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
