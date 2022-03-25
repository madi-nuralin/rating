<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employement extends Model
{
    use HasFactory,
        Helpers\HasId,
        Helpers\BelongsToEmployementType,
        Helpers\BelongsToDepartment,
        Helpers\BelongsToPosition,
        Helpers\BelongsToUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'employement_type_id',
        'department_id',
        'position_id',
        'user_id',
        'appointed_at',
        'terminated_at'
    ];


    public function setAppointedAt($appointedAt) {
        $this->appointed_at = $appointedAt;
    }

    public function setTerminatedAt($terminatedAt) {
        $this->terminated_at = $terminatedAt;
    }

    public function getAppointedAt() {
        return $this->appointed_at;
    }

    public function getTerminatedAt() {
        return $this->terminated_at;
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'appointed_at' => $this->getAppointedAt(),
            'terminated_at' => $this->getTerminatedAt(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
