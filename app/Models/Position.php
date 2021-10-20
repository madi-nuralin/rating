<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory, Helpers\SettingHelper;

    public function settings() {
        return $this->hasMany(PositionSetting::class);
    }

    public function departments() {
        return $this->belongsToMany(Department::class, 'employements');
    }

    public function getId() {
        return $this->id;
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
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description',
            $description
        );
    }

    public function getDepartments() {
        return $this->departments->map(function($department) {
            return $department->toArray();
        });
    }

    public function createdAt() {
        return $this->created_at;
    }

    public function updatedAt() {
        return $this->updated_at;
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'created_at' => $this->createdAt(),
            'updated_at' => $this->updatedAt(),
        ];
    }
}
