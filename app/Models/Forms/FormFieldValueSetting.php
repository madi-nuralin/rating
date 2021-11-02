<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldValueSetting extends Model
{
    use HasFactory;

    protected $table = 'form_field_value_settings';

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

    public function formFieldValue() {
        return $this->belongsTo(FormFieldValue::class);
    }
}
