<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory,
        Helpers\HasId,
        Helpers\HasName,
        Helpers\HasDescription;

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

    public function getParent() {
        return $this->parent;
    }

    public function setParent($parent) {
        $this->parent = $parent;
    }

    public function getPositions() {
        return $this->positions ? $this->positions->map(function($position) {
            return $position->toArray();
        }) : null;
    }

    public function setPositions($positions) {
        if (is_null($positions) || empty($positions)) {
            $this->positions()->detach();
            return;
        }

        if ($this->positions()) {
            $this->positions()->detach(
                array_diff($this->positions()->pluck('positions.id')->toArray(), $positions));
            $this->positions()->attach(
                array_diff($positions, $this->positions()->pluck('positions.id')->toArray()));
        } else {
            $this->positions()->attach($positions);
        }
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'parent' => $this->getParent(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
