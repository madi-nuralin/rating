<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\SettingHelper;
use App\Models\Helpers\FileHelper;

use App\Models\Helpers\HasId;
use App\Models\Helpers\HasValue;

class FormFieldResponce extends Model
{
    use HasFactory,
        HasId,
        HasValue;

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

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'value' => $this->getValue(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
