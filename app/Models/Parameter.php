<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Forms\Form;

class Parameter extends Model
{
    use HasFactory,
    	Helpers\HasId,
        Helpers\HasName,
        Helpers\HasDescription,
        Helpers\HasManySubmission,
        Helpers\BelongsToParameterTarget,
        Helpers\BelongsToManyRating,
        Helpers\BelongsToManyForm;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'parameter_target_id'
    ];

    public function settings() {
        return $this->hasMany(ParameterSetting::class);
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
