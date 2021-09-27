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
}