<?php

namespace App\Models\Helpers;

use App\Models\Position;

trait BelongsToManyPosition
{
	public function positions()
	{
    	return $this->belongsToMany(Position::class);
    }

    public function setPositions($positions)
    {
    	if (is_null($positions) || empty($positions)) {
            $this->positions()->detach();
            return;
        }

    	$this->positions()->sync($positions);
    }

    public function addPositions($positions)
    {
    	if (is_null($positions) || is_empty($positions)) {
            return;
        }

    	$this->positions()->attach(
    		array_diff($positions, $this->positions()->pluck('positions.id'))
    	);	
    }

    public function addPosition(Position $position)
    {
		$this->addPositions(array($position->id));
    }

    public function deletePositions($positions)
    {
    	$this->positions()->detach($positions);
    }

    public function deletePosition(Position $position)
    {
    	$this->deletePositions(array($position->id));
    }
}