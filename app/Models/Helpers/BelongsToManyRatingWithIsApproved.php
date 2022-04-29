<?php

namespace App\Models\Helpers;

use App\Models\Rating;

trait BelongsToManyRatingWithIsApproved
{
	public function ratings()
	{
    	return $this->belongsToMany(Rating::class)->withPivot('is_approved');
    }

    public function ratingIsApproved($rating): bool {
        return $this->ratings()
             ->firstWhere('rating_id', $rating->id)
             ->pivot
             ->is_approved;
    }

    public function approveRating(Rating $rating) {
        $this->ratings()
             ->updateExistingPivot($rating, array('is_approved' => true), true);
    }

    public function setRatings($ratings)
    {
    	if (is_null($ratings) || empty($ratings)) {
            $this->ratings()->detach();
            return;
        }

    	$this->ratings()->sync($ratings);
    }

    public function addRatings($ratings)
    {
    	if (is_null($ratings) || empty($ratings)) {
            return;
        }

    	$this->ratings()->attach(
    		array_diff($ratings, $this->ratings()->pluck('ratings.id')->toArray())
    	);	
    }

    public function addRating(Rating $rating)
    {
		$this->addRatings(array($rating->id));
    }

    public function deleteRatings($ratings)
    {
    	$this->ratings()->detach($ratings);
    }

    public function deleteRating(Rating $rating)
    {
    	$this->deleteRatings(array($rating->id));
    }
}