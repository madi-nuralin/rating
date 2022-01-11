<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionProlongation extends Model
{
    use HasFactory,
    	Helpers\HasId;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
    	'rating_id'
        'prolongated_at',
    ];

    public function rating() {
    	return $this->belongsTo(Rating::class);
    }

    public function setRating(Rating $rating) {
    	$this->rating()->associate($rating);
    }

    public function getRating() {
    	return $this->rating;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'prolongated_at' => $this->prolongated_at,
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	]
    }
}
