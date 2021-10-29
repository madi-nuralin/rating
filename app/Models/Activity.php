<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
    	'assignment_id',
        'parameter_id',
        'score'
    ];

	public function assignment() {
    	return $this->belongsTo(Assignment::class);
    }

    public function parameter() {
    	return $this->belongsTo(Parameter::class);
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

    public function getAssignment() {
    	return $this->assignment->toArray();
    }

    public function setAssignment($assignment) {
        $this->assignment()->associate($assignment);
    }

    public function getParameter() {
    	return $this->parameter->toArray();
    }

    public function setParameter($parameter) {
        $this->parameter()->associate($parameter);
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'score' => $this->getScore(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
