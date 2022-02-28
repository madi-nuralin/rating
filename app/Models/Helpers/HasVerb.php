<?php

namespace App\Models\Helpers;

trait HasVerb
{
	public function getVerb($locale=null) {
        return $this->getSetting(
            'verb',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setVerb($verb, $locale=null) {
        $this->setSetting(
            'verb',
            $verb,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}