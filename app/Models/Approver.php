<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    use HasFactory,
    	Helpers\HasId,
    	Helpers\BelongsToRating,
    	Helpers\BelongsToUser,
    	Helpers\BelongsToDepartment;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'department_id',
        'user_id',
        'rating_id'
    ];

    public function toArray()
    {
    	return [
    		'id' => $this->getId(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
