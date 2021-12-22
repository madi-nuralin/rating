<?php

namespace App\Models\Helpers;

trait HasName
{
    use SettingHelper;

	public function getName($locale=null) {
        return $this->getSetting(
            'name',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setName($name, $locale=null) {
        $this->setSetting(
            'name',
            $name,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}