<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleOption extends Model
{
    use HasFactory, Helpers\SettingHelper;

    public function settings() {
        return $this->hasMany(RuleOptionSetting::class);
    }

    public function rule() {
        return $this->belongsTo(Rule::class);
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

    public function getRule() {
        return $this->rule->toArray();
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
