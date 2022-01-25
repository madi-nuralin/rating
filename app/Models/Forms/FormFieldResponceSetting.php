<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldResponceSetting extends Model
{
    use HasFactory;

    protected $table = 'form_field_responce_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting_locale',
        'setting_name',
        'setting_value',
        'setting_type',
        'setting_json'
    ];

    public function formFieldResponce() {
        return $this->belongsTo(FormFieldResponce::class);
    }
}
