<?php

namespace App\Models\Helpers;

trait HasLabel
{
    use SettingHelper;

	public function getLabel($locale=null) {
        return $this->getSetting(
            'label',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setLabel($label, $locale=null) {
        $this->setSetting(
            'label',
            $label,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}