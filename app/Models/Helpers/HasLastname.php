<?php

namespace App\Models\Helpers;

trait HasLastname
{
    use SettingHelper;

	public function getLastname($locale=null) {
        return $this->getSetting(
            'lastname',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setLastname($lastname, $locale=null) {
        $this->setSetting(
            'lastname',
            $lastname,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}