<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory,
        Helpers\HasId,
        Helpers\HasName,
        Helpers\HasDescription,
        Helpers\BelongsToManyUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'context',
    ];

    public function settings() {
    	return $this->hasMany(RoleSetting::class);
    }

    public function getContext() {
        return $this->context;
    }

    public function setContext($context) {
        $this->context = $context;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
            'description' => $this->getDescription(),
            'context' => $this->getContext(),
    		'created_at' => $this->created_at,
           	'updated_at' => $this->updated_at,
    	];
    }
}
