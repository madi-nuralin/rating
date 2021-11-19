<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting_locale',
        'setting_name',
        'setting_value',
        'setting_type'
    ];

    public static function get($name, $locale=null) {

    	$conditions = [
    		['setting_locale', '=', $locale]
    	];

    	$setting = Setting::where($conditions)->firstWhere('setting_name', $name);

    	if (! is_null($setting)) {
    		$obj = $setting->setting_value;
    		settype($obj, $setting->setting_type);
    		
    		return $obj;
    	}

    	return null;
    }

    public static function set($name, $value, $locale=null) {

    	$match = [
    		'setting_locale' => $locale,
    		'setting_name' => $name
    	];

    	Setting::updateOrCreate($match, ['setting_type' => gettype($value), 'setting_value' => $value])->save();
    }
}
