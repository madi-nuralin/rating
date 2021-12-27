<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory,
    	Helpers\HasId,
    	Helpers\HasName,
    	Helpers\HasDescription;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'submission_started_at',
        'submission_finished_at',
        'confirmation_started_at',
        'confirmation_finished_at'
    ];

    public function settings() {
    	return $this->hasMany(RatingSetting::class);
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
    		'description' => $this->getDescription(),
    		'submission_started_at' => $this->submission_started_at,
    		'submission_finished_at' => $this->submission_finished_at,
    		'confirmation_started_at' => $this->confirmation_started_at,
    		'confirmation_finished_at' => $this->confirmation_finished_at,
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
