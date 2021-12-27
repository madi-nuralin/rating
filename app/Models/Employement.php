<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employement extends Model
{
    use HasFactory,
        Helpers\HasId;

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

    public function employementType() {
        return $this->belongsTo(EmployementType::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setEmployementType(EmployementType $employementType) {
        $this->employementType()->associate($employementType);
    }

    public function setDepartment(Department $department) {
        $this->department()->associate($department);
    }

    public function setPosition(Position $position) {
        $this->position()->associate($position);
    }

    public function setUser(User $user) {
        $this->user()->associate($user);
    }

    public function setAppointedAt(/*DateTime*/ $appointedAt) {
        $this->appointed_at = $appointedAt;
    }

    public function setTerminatedAt(/*DateTime*/ $terminatedAt) {
        $this->terminated_at = $terminatedAt;
    }

    public function getEmployementType() {
        return $this->employementType;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getUser() {
        return $this->user;
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
