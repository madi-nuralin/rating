<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory, Helpers\SettingHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'valid_from',
        'valid_to'
    ];

    public function settings() {
        return $this->hasMany(AssessmentSetting::class);
    }

    public function getId() {
        return $this->id;
    }

    public function getValidFrom() {
        return $this->valid_from;
    }

    public function setValidFrom($validFrom) {
        $this->valid_from = $validFrom;
    }

    public function getValidTo() {
        return $this->valid_to;
    }

    public function setValidTo($validTo) {
        $this->valid_to = $validTo;
    }

    public function getName() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'name'
        );
    }

    public function setName($name) {
        return $this->updateSettingValue(
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
        return $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'description',
            $description
        );
    }    

    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'valid_from' => $this->getValidFrom(),
            'valid_to' => $this->getValidTo(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
