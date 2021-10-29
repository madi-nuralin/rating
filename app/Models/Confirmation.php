<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'confirmer_id',
        'assignment_id',
        'status'
    ];

    public function confirmer() {
    	return $this->belongsTo(Confirmer::class);
    }

    public function assignment() {
    	return $this->belongsTo(Assignment::class);
    }

    public function getId() {
    	return $this->id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getConfirmer() {
    	return $this->user->toArray();
    }

    public function getAssignment() {
    	return $this->assignment->toArray();
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'status' => $this->getStatus(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
