<?php

namespace App\Models\Helpers;

use App\Models\Employement;

trait HasManyEmployement
{
	public function employements()
	{
    	return $this->hasMany(Employement::class);
    }

    public function getEmployements(/*Date*/ $from, /*Date*/ $to)
    {
    	if (is_null($from) && !is_null($to)) {
    		return collect(
    			$this->employements()->whereNull('terminated_at')->orWhere([
					['terminated_at', '>=', $to],
					['user_id', '=', $this->id]
				])->get()
    		);
    	} else if (!is_null($from) && is_null($to)) {
    		return collect(
    			$this->employements()->whereNull('appointed_at')->orWhere([
					['appointed_at', '<=', $from],
					['user_id', '=', $this->id]
				])->get()
    		);
    	} else if (!is_null($from) && !is_null($to)) {
    		return $this->employements;
    	} else {
    		return collect(
    			$this->employements()->where([
					['appointed_at', '>=', $from],
					['terminated_at', '<=', $to]
				])->get()
    		);
    	}
    }
}