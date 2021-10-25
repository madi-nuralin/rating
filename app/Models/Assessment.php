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

    public function employements() {
        return $this->belongsToMany(Employement::class);
    }

    public function confirmers() {
        return $this->belongsToMany(Confirmer::class);
    }

    public function parameters() {
        return $this->belongsToMany(Parameter::class);
    }

    public function assignments() {
        return $this->hasMany(Assignment::class);
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

    public function getName($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'name'
        );
    }

    public function setName($name, $locale=null) {
        return $this->updateSettingValue(
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

    public function getEmployements() {
        return $this->employements->map(function($employement) {
            return $employement->toArray();
        });
    }

    public function setEmployements($employements) {
        if ($this->employements()) {
            $this->employements()->detach();
        }
        if (count($employements) > 0) {
            $this->employements()->attach($employements);
        }
    }

    public function getConfirmers() {
        return $this->confirmers->map(function($confirmer) {
            return $confirmer->toArray();
        });
    }

    public function setConfirmers($confirmers) {
        if ($this->confirmers()) {
            $this->confirmers()->detach();
        }
        if (count($confirmers) > 0) {
            $this->confirmers()->attach($confirmers);
        }
    }

    public function getParameters() {
        return $this->parameters->map(function($parameter) {
            return $parameter->toArray();
        });
    }

    public function setParameters($parameters) {
        if ($this->parameters()) {
            $this->parameters()->detach();
        }
        if (count($parameters) > 0) {
            $this->parameters()->attach($parameters);
        }
    }

    public function getAssignments() {
        return $this->assignments->map(function($assignment) {
            return $assignment->toArray();
        });
    }

    public function setAssignments($assignments) {
        /*if ($this->assignments()) {
            $this->assignments()->detach();
        }
        if (count($assignments) > 0) {
            $this->assignments()->attach($assignments);
        }*/
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
