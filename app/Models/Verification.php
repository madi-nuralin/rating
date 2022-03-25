<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory,
    	Helpers\HasId,
        Helpers\HasMessage,
        Helpers\BelongsToVerifier,
        Helpers\BelongsToVerificationStatus,
        Helpers\BelongsToSubmission;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'submission_id',
        'verifier_id',
        'verification_status_id'
    ];

    public function settings() {
        return $this->hasMany(VerificationSetting::class);
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'message' => $this->getMessage(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
