<?php

namespace App\Models\Helpers;

trait HasAbbreviation
{
    use SettingHelper;

	public function getAbbreviation($locale=null) {
        return $this->getSetting(
            'abbreviation',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setAbbreviation($abbreviation, $locale=null) {
        $this->setSetting(
            'abbreviation',
            $abbreviation,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}