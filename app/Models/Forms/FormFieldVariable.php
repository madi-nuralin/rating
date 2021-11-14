<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

class FormFieldVariable extends Model
{
    use HasFactory, SettingHelper;

    protected $table = 'form_field_variables';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_field_id',
    ];

    public function settings() {
    	return $this->hasMany(FormFieldVariableSetting::class);
    }

    public function formField() {
    	return $this->belongsTo(FormField::class);
    }

    public function values() {
        return $this->hasMany(FormFieldVariableValue::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getName($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'name'
        );
    }

    public function setName($name, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'name',
            $name
        );
    }

    public function getDescription($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description'
        );
    }

    public function setDescription($name, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description',
            $name
        );
    }

    public function getFormField() {
    	return $this->formField;
    }

    public function setFormField($formField) {
    	//
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
