<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifier extends Model
{
    use HasFactory,
    	Helpers\HasId;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'rating_id',
        'parameter_target_id',
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function rating() {
    	return $this->belongsTo(Rating::class);
    }

    public function parameterTarget() {
    	return $this->belongsTo(ParameterTarget::class);
    }

    public function verifications() {
        return $this->hasMany(Verification::class);
    }

    public function setUser(User $user) {
    	$this->user()->associate($user);
    }

    public function setRating(Rating $rating) {
    	$this->rating()->associate($rating);
    }

    public function setParameterTarget(ParameterTarget $parameterTarget) {
    	$this->parameterTarget()->associate($parameterTarget);
    }

    public function getUser() {
    	return $this->user;
    }

    public function getRating() {
    	return $this->rating;
    }

    public function getParameterTarget() {
    	return $this->parameterTarget;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
