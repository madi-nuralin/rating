<?php

namespace App\Models\Helpers;

use App\Models\Rating;

trait BelongsToManyRating
{
	public function ratings()
	{
    	return $this->belongsToMany(Rating::class);
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
    	if (is_null($ratings) || is_empty($ratings)) {
            return;
        }

    	$this->ratings()->attach(
    		array_diff($ratings, $this->ratings()->pluck('ratings.id'))
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