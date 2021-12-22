<?php

namespace App\Models\Helpers;

trait HasId
{
	public function getId() {
        return $this->id;
    }
}