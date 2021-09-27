<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, Helpers\Setting;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'root',
    ];

    public function settings() {
        return $this->hasMany(DepartmentSetting::class);
    }

    public function positions() {
        return $this->belongsTo(Position::class);
    }

    public function getRoot() {
        return $this->root;
    }

    public function setRoot($root) {
        $this->root = $root;
    }

    public function getName() {
        return getSettingValue(
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
        return getSettingValue(
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
        return $this->positions->map(function($position) {
            return $position->toArray();
        });
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'root' => $this->getRoot(),
            'name' => $this->getName(),
            'description' => $this->getDescription()
        ]
    }
}
