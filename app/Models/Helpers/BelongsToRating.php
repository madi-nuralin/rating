<?php

namespace App\Models\Helpers;

use App\Models\Rating;

trait BelongsToRating
{
	public function rating()
    {
        return $this->belongsTo(Rating::class);
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating(Rating $rating)
    {
    	$this->rating()->associate($rating);
    }
}