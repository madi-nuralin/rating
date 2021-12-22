<?php

namespace App\Models\Helpers;

trait SettingHelper {

	public function getSettingValue($settingLocale, $settingType, $settingName) {
        return $this->settings()
                    ->where('setting_locale', $settingLocale)
                    ->where('setting_type', $settingType)
                    ->firstWhere('setting_name', $settingName)
                    ->setting_value ?? '';
    }

    public function updateSettingValue($settingLocale, $settingType, $settingName, $settingValue) {
        $model = $this
        	->settings()
        	->updateOrCreate(
		        ['setting_locale' => $settingLocale,
		         'setting_type' => $settingType,
		         'setting_name' => $settingName],
		        ['setting_value' => $settingValue]
        	);

        $model->save();

        return $model;
    }

    public function setSetting($settingName, $settingValue, $settingLocale=null)
    {
        $match = [
            'setting_locale' => $settingLocale,
            'setting_name' => $settingName
        ];

        $replace = [
            'setting_type' => gettype($settingValue),
            'setting_value' => $settingValue
        ];

        $this->settings()->updateOrCreate($match, $replace)->save();
    }

    public function getSetting($settingName, $settingLocale=null)
    {
        $match = [
            ['setting_locale', '=', $settingLocale]
        ];

        $setting = $this->settings()->where($match)->firstWhere('setting_name', $settingName);

        if (! is_null($setting) ) {
            $obj = $setting->setting_value;
            settype($obj, $setting->setting_type);
            
            return $obj;
        }

        return null;
    }
}