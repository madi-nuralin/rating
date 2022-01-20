<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Helpers\HasId;
use App\Models\Helpers\HasName;
use App\Models\Helpers\HasDescription;

class FormFieldOption extends Model
{
    use HasFactory,
        HasId,
        HasName,
        HasDescription;

    protected $table = 'form_field_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_field_id'
    ];

    public function settings() {
    	return $this->hasMany(FormFieldOptionSetting::class);
    }

    public function formField() {
    	return $this->belongsTo(FormField::class);
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
