<?php

namespace App\Models\Forms;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

use App\Models\Helpers\HasId;
use App\Models\Helpers\HasValue;

class FormFieldResponce extends Model
{
    use HasFactory,
        HasId,
        HasValue;
    use SettingHelper;

    protected $table = 'form_field_responces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_field_id',
    ];

    public function settings() {
    	return $this->hasMany(FormFieldResponceSetting::class);
    }

    public function formField() {
    	return $this->belongsTo(FormField::class);
    }

    public function getFormField() {
    	return $this->formField;
    }

    public function setFormField($formField) {
    	$this->formField()->associate($formField)->save();
    }

    public function setValue($value, $locale=null) {
        $rules = $this->formField->getValidationRules();
        $locale = isset($locale) ? $locale : app()->currentLocale();

        switch ($this->formField->getType()) {
            case FormField::NUMBER:
                $this->setSetting('value', isset($rules['is_integer']) ? (integer)$value : (float)$value, null);
                break;
            
            case FormField::TEXT:
            case FormField::TEXTAREA:
                $this->setSetting('value', (string)$value, $locale);
                break;

            case FormField::EMAIL:
            case FormField::URL:
                $this->setSetting('value', (string)$value, null);
                break;

            case FormField::SELECT:
                $this->setSetting('value', (integer)$value, null);
                break;

            case FormField::MULTISELECT:
                $this->setSetting('value', $value, null, true);
                break;

            case FormField::FILE:
                $this->setSetting('value', $value, null);
                break;

            case FormField::TIME:
            case FormField::DATE:
            case FormField::DATETIME:
            case FormField::DATETIME_LOCAL:
                $this->setSetting('value', (string)$value, null);

            default:
                # code...
                break;
        }
    }

    public function getValue($locale=null) {
        switch ($this->formField->getType()) {
            case FormField::NUMBER:
            case FormField::EMAIL:
            case FormField::URL:
            case FormField::TIME:
            case FormField::DATE:
            case FormField::DATETIME:
            case FormField::DATETIME_LOCAL:
            case FormField::SELECT:
                return $this->getSetting('value', null);

            case FormField::MULTISELECT:
                return $this->getSetting('value', null, true);
            
            case FormField::TEXT:
            case FormField::TEXTAREA:
                return $this->getSetting('value', isset($locale) ? $locale : app()->currentLocale());

            case FormField::FILE:
                return Storage::url($this->getSetting('value', null));

            default:
                return null;
        }
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'value' => $this->getValue(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
