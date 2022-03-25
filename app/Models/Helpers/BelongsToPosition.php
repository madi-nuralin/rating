<?php

namespace App\Models\Helpers;

use App\Models\Position;

trait BelongsToPosition
{
	public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition(Position $position)
    {
    	$this->position()->associate($position);
    }
}