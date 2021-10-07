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

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'name'
        );
    }

    public function setName($name) {
        $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'name',
            $name
        );
    }

    public function getDescription() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'description'
        );
    }

    public function setDescription($description) {
        $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'description',
            $description
        );
    }

    public function getInputType() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'input_type'
        );
    }

    public function setInputType($inputType) {
        $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'input_type',
            $inputType
        );
    }

    public function getValidationRules() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'validation_rules'
        );
    }

    public function setValidationRules($validationRules) {
        $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'validation_rules',
            $validationRules
        );
    }

    public function getMathExpression() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'math_expression'
        );
    }

    public function setMathExpression($mathExpression) {
        $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'math_expression',
            $mathExpression
        );
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getParameters() {
        return $this->parameters->map(function($parameter) {
            return $parameter->toArray();
        });
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'input_type' => $this->getInputType(),
            'validation_rules' => $this->getValidationRules(),
            'math_expression' => $this->getMathExpression(),
        ];
    }
}
