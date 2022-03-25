<?php

namespace App\Models\Helpers;

use App\Models\Employement;

trait HasManyEmployement
{
	public function employements()
	{
    	return $this->hasMany(Employement::class);
    }
}