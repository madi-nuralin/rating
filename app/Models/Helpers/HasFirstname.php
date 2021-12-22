<?php

namespace App\Models\Helpers;

trait HasFirstname
{
    use SettingHelper;

	public function getFirstname($locale=null) {
        return $this->getSetting(
            'firstname',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setFirstname($firstname, $locale=null) {
        $this->setSetting(
            'firstname',
            $firstname,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}