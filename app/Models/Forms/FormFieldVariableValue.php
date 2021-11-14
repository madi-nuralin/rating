<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;

class FormFieldVariableValue extends Model
{
    use HasFactory, SettingHelper;

    protected $table = 'form_field_variable_values';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_field_variable_id',
    ];

    public function settings() {
    	return $this->hasMany(FormFieldVariableValueSetting::class);
    }

    public function formFieldVariable() {
    	return $this->belongsTo(FormFieldVariable::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getContext($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : '',
            'string',
            'context'
        );
    }

    public function setContext($name, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : '',
            'string',
            'context',
            $context
        );
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'context' => $this->getContext(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
