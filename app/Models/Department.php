<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory,
        Helpers\HasId,
        Helpers\HasName,
        Helpers\HasDescription,
        Helpers\HasAbbreviation,
        Helpers\BelongsToDepartmentType,
        Helpers\BelongsToManyPosition;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'department_type_id',
        'parent_id',
    ];

    public function settings() {
        return $this->hasMany(DepartmentSetting::class);
    }

    public function getParent() {
        return $this->parent_id;
    }

    public function setParent($parent) {
        $this->parent_id = $parent;
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'abbreviation' => $this->getAbbreviation(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
