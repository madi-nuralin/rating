<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function assessments() {
    	return $this->belongsToMany(Assessment::class);
    }

    public function assignments() {
    	return $this->belongsToMany(Assignment::class, 'confirmations');
    }

    public function confirmations() {
        return $this->hasMany(Confirmation::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getUser() {
    	return $this->user->toArray();
    }

    public function getAssessments() {
    	return $this->assessments->map(function($assessment) {
    		return $assessment->toArray();
    	});
    }

    public function setAssessments($assessments) {
        if ($this->assessments()) {
            $this->assessments()->detach();
        }
        if (count($assessments) > 0) {
            $this->assessments()->attach($assessments);
        }
    }

    public function getAssignments() {
    	return $this->assignments->map(function($assignment) {
    		return $assignment->toArray();
    	});
    }

    public function setAssignments($assignments) {
        if ($this->assignments()) {
            $this->assignments()->detach();
        }
        if (count($assignments) > 0) {
            $this->assignments()->attach($assignments);
        }
    }

    public function getConfirmations() {
        return $this->confirmations->map(function($confirmation) {
            return $confirmation->toArray();
        });
    }

    public function setConfirmations($confirmations) {
        if ($this->confirmations()) {
            $this->confirmations()->detach();
        }
        if (count($confirmations) > 0) {
            $this->confirmations()->attach($confirmations);
        }
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
