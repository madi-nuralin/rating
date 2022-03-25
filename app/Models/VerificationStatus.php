<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationStatus extends Model
{
    use HasFactory,
        Helpers\HasId,
        Helpers\HasName,
        Helpers\HasDescription,
        Helpers\HasVerb,
        Helpers\HasManyVerification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'context',
        'color'
    ];

    public function settings() {
    	return $this->hasMany(VerificationStatusSetting::class);
    }

    public function getContext() {
        return $this->context;
    }

    public function getColor() {
        return $this->color;
    }

    public function setContext($context) {
        $this->context = $context;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'context' => $this->getContext(),
            'color' => $this->getColor(),
            'verb' => $this->getVerb(),
    		'name' => $this->getName(),
            'description' => $this->getDescription(),
    		'created_at' => $this->created_at,
           	'updated_at' => $this->updated_at,
    	];
    }
}
