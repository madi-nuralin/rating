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
        Helpers\BelongsToManyPosition;

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

    public function getParent() {
        return $this->parent;
    }

    public function setParent($parent) {
        $this->parent = $parent;
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
