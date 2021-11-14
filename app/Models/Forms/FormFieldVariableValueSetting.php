<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldVariableValueSetting extends Model
{
    use HasFactory;

    protected $table = 'form_field_variable_value_settings';

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

    public function formFieldVariableValue() {
        return $this->belongsTo(FormFieldVariableValue::class);
    }
}
