<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, Helpers\SettingHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'parent',
    ];

    public function settings() {
        return $this->hasMany(DepartmentSetting::class);
    }

    public function positions() {
        return $this->belongsToMany(Position::class);
    }

    public function getId() {
        return $this->id;
    }

    public function getParent() {
        return $this->parent;
    }

    public function setParent($parent) {
        $this->parent = $parent;
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

    public function getPositions() {
        return $this->positions ? $this->positions->map(function($position) {
            return $position->toArray();
        }) : null;
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
            'parent' => $this->getParent(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'created_at' => $this->createdAt(),
            'updated_at' => $this->updatedAt(),
        ];
    }
}
