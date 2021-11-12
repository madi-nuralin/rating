<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldVariableSetting extends Model
{
    use HasFactory;

    protected $table = 'form_field_variable_settings';

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

    public function variable() {
        return $this->belongsTo(FormFieldVariable::class);
    }
}
