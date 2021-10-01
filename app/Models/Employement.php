<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'department_id',
        'position_id'
    ];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function assessments() {
        return $this->belongsToMany(Assessment::class, 'assessment_employement');
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function getId() {
        return $this->id;
    }

    public function getDepartment() {
        return $this->department->toArray();
    }

    public function getPosition() {
        return $this->position->toArray();
    }

    public function getAssessments() {
        return $this->assessments->map(function($assessment) {
            return $assessment->toArray();
        });
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
