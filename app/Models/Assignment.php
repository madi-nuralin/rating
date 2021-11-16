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

    public function addScore($score) {
        $this->score += $score;
    }

    public function subScore($score) {
        $this->score -= $score;
    }

    public function getAssessment() {
        return $this->assessment->toArray();
    }

    public function setAssessment($assessment) {
        $this->assessment()->associate($assessment);
    }

    public function getEmployement() {
        return $this->employement->toArray();
    }

    public function setEmployement($employement) {
        $this->employement()->associate($employement);
    }

    public function getUser() {
        return $this->user->toArray();
    }

    public function setUser($user) {
        $this->user()->associate($user);
    }

    public function getConfirmers() {
        return $this->confirmers->map(function($confirmer) {
            return $confirmer->toArray();
        });
    }

    public function setConfirmers($confirmers) {
        if (is_null($confirmers) || empty($confirmers)) {
            $this->confirmers()->detach();
            return;
        }

        if ($this->confirmers()) {
            $this->confirmers()->detach(
                array_diff($this->confirmers()->pluck('confirmers.id')->toArray(), $confirmers));
            $this->confirmers()->attach(
                array_diff($confirmers, $this->confirmers()->pluck('confirmers.id')->toArray()));
        } else {
            $this->confirmers()->attach($confirmers);
        }
    }

    public function getActivities() {
        return $this->activities->map(function($activity) {
            return $activity->toArray();
        });
    }

    public function setActivities($activity) {
        if (is_null($activities) || empty($activities)) {
            $this->activities()->detach();
            return;
        }

        if ($this->activities()) {
            $this->activities()->detach(
                array_diff($this->activities()->pluck('activities.id')->toArray(), $activities));
            $this->activities()->attach(
                array_diff($activities, $this->activities()->pluck('activities.id')->toArray()));
        } else {
            $this->activities()->attach($activities);
        }
    }

    public function getConfirmations() {
        return $this->confirmations->map(function($confirmation) {
            return $confirmation->toArray();
        });
    }

    public function setConfirmations($confirmations) {
        if (is_null($confirmations) || empty($confirmations)) {
            $this->confirmations()->detach();
            return;
        }

        if ($this->confirmations()) {
            $this->confirmations()->detach(
                array_diff($this->confirmations()->pluck('confirmations.id')->toArray(), $confirmations));
            $this->confirmations()->attach(
                array_diff($confirmations, $this->confirmations()->pluck('confirmations.id')->toArray()));
        } else {
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
