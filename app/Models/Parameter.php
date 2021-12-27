<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory,
    	Helpers\HasId;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'parameter_target_id',
    ];

    public function parameterTarget() {
    	return $this->belongsTo(ParameterTarget::class);
    }

    public function setParameterTarget(ParameterTarget $parameterTarget) {
    	$this->parameterTarget()->associate($parameterTarget);
    }

    public function getParameterTarget() {
    	return $this->parameterTarget;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
