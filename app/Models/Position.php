<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory,
        Helpers\HasId,
        Helpers\HasName,
        Helpers\HasDescription;

    public function settings() {
        return $this->hasMany(PositionSetting::class);
    }

    public function departments() {
        return $this->belongsToMany(Department::class);
    }

    public function getDepartments() {
        return $this->departments->map(function($department) {
            return $department->toArray();
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
