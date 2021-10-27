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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function confirmers() {
        return $this->belongsToMany(Confirmer::class, 'confirmations');
    }

    public function confirmations() {
        return $this->hasMany(Confirmation::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
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

    public function getUser() {
        return $this->user->toArray();
    }

    public function setUser($user) {
        if ($this->user()) {
            $this->user()->delete();
        }
        $this->user->save($user);
    }

    public function getConfirmers() {
        return $this->confirmers->map(function($confirmer) {
            return $this->confirmer->toArray();
        });
    }

    public function setConfirmers($confirmers) {
        if ($this->confirmers()) {
            $this->confirmers()->delete();
        }
        if (count($confirmers) > 0) {
            $this->confirmers()->attach($confirmers);
        }
    }

    public function getActivities() {
        return $this->activities->map(function($activity) {
            return $this->activity->toArray();
        });
    }

    public function setActivities($activity) {
        if ($this->activities()) {
            $this->activities()->detach();
        }
        if (count($activities) > 0) {
            $this->activities()->attach($activities);
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
            'score' => $this->getScore(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
