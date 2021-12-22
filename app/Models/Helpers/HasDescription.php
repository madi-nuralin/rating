<?php

namespace App\Models\Helpers;

trait HasDescription
{
	public function getDescription($locale=null) {
        return $this->getSetting(
            'description',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setDescription($description, $locale=null) {
        $this->setSetting(
            'description',
            $description,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}