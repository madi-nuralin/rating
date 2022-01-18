<?php

namespace App\Models\Helpers;

trait HasValue
{
    use SettingHelper;

	public function getValue($locale=null) {
        return $this->getSetting(
            'value',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setValue($value, $locale=null) {
        $this->setSetting(
            'value',
            $value,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}