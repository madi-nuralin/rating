<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'assessment_id',
        'parameter_id',
        'employement_id',
        'user_id',
        'score'
    ];

    public function assessment() {
        return $this->belongsTo(Assessment::class);
    }

    public function employement() {
        return $this->belongsTo(Employement::class);
    }

    public function parameter() {
        return $this->belongsTo(Parameter::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getId() {
        return $this->id;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function getAssessment() {
        return $this->assessment->toArray();
    }

    public function getEmployement() {
        return $this->employement->toArray();
    }

    public function getParameter() {
        return $this->parameter->toArray();
    }

    public function getUser() {
        return $this->user->toArray();
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'score' => $this->getScore(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
