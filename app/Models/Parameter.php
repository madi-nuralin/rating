<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory, Helpers\SettingHelper;

    public function settings() {
        return $this->hasMany(ParameterSetting::class);
    }

    public function assessments() {
        return $this->belongsToMany(Assessment::class);
    }

    public function rules() {
        return $this->belongsToMany(Rule::class);
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

    public function getAssessments() {
        return $this->assessments->map(function($assessment) {
            return $assessment->toArray();
        });
    }

    public function getRules() {
        return $this->rules->map(function($rule) {
            return $rule->toArray();
        });
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
