<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

class FormFieldValue extends Model
{
    use HasFactory, SettingHelper;

    protected $table = 'form_field_values';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_field_id',
    ];

    public function settings() {
    	return $this->hasMany(FormFieldValueSetting::class);
    }

    public function formField() {
    	return $this->belongsTo(FormField::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getFormField() {
    	return $this->formField;
    }

    public function setFormField($formField) {
    	$this->formField()->associate($formField)->save();
    }

    private function _getSettingLocale() {
        switch ($this->formField->getType()) {
            case FormField::TEXT:
                return app()->currentLocale();

            case FormField::SELECT:
            case FormField::MULTISELECT:
            case FormField::FILE:
                return '';

            default:
                return '';
        }
    }

    private function _getSettingType() {
        switch ($this->formField->getType()) {
            case FormField::TEXT:
            case FormField::FILE:
                return 'string';

            case FormField::SELECT:
            case FormField::MULTISELECT:
                return 'integer';

            default:
                return 'string';
        }
    }

    /*public function getContext($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'context'
        );
    }

    public function setContext($context, $locale=null) {
        return $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'context',
            $context
        );
    }*/

    public function setContext($context) {

        $this->updateSettingValue(
            $this->_getSettingLocale(),
            $this->_getSettingType(),
            'context',
            $context
        );
    }

    public function getContext() {
        $ret = $this->getSettingValue(
            $this->_getSettingLocale(),
            $this->_getSettingType(),
            'context'
        );
        return $this->_getSettingType() == 'integer'
            ? intval($ret)
            : $ret;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
