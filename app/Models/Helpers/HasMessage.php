<?php

namespace App\Models\Helpers;

trait HasMessage
{
    use SettingHelper;
    
	public function getMessage($locale=null) {
        return $this->getSetting(
            'message',
            isset($locale) ? $locale : app()->currentLocale()
        );
    }

    public function setMessage($message, $locale=null) {
        $this->setSetting(
            'message',
            $message,
            isset($locale) ? $locale : app()->currentLocale()
        );
    }
}