<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        Helpers\HasId,
        Helpers\HasFirstname,
        Helpers\HasLastname,
        Helpers\FileHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function settings() {
        return $this->hasMany(UserSetting::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function employements() {
        return $this->hasMany(Employement::class);
    }

    public function ratings() {
        return $this->belongsToMany(Rating::class);
    }

    public function verifiers() {
        return $this->hasMany(Verifier::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    /*public function setEmail($email) {
        $this->email = $email;
    }*/

    public function getProfilePhotoPath() {
        return $this->profile_photo_path;
    }

    public function getProfilePhotoUrl() {
        return $this->getFileUrl(
            $this->profile_photo_path,
            'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF'
        );
    }

    public function updateProfilePhoto($photo) {
        $this->updateFile(
            $photo,
            $this->profile_photo_path,
            'profile_photo_path',
            'profile-photos'
        );
    }

    public function deleteProfilePhoto() {
        $this->deleteFile(
            $this->profile_photo_path,
            'profile_photo_path'
        );
    }

    public function getRoles() {
        return $this->roles->map(function($role) {
            return $role->toArray();
        });
    }

    public function setRoles($roles) {
        if ($this->roles()) {
            $this->roles()->detach();
        }
        if (count($roles) > 0) {
            $this->roles()->attach($roles);
        }
        foreach ($this->roles as $role) {
            if ($role->getContext() == 'confirmer') {
                if ($this->confirmer === null) {
                    $this->setConfirmer(new Confirmer());
                }
            }
        }
    }

    public function getEmployements() {
        return $this->employements->map(function($employement) {
            return $employement->toArray();
        });
    }

    public function setEmployements($employements) {
        if (is_null($employements) || empty($employements)) {
            $this->employements()->detach();
            return;
        }

        if ($this->employements()) {
            $this->employements()->detach(
                array_diff($this->employements()->pluck('employements.id')->toArray(), $employements));
            $this->employements()->attach(
                array_diff($employements, $this->employements()->pluck('employements.id')->toArray()));
        } else {
            $this->employements()->attach($employements);
        }
    }

    public function getAssignments() {
        return $this->assignments->toArray();
    }

    public function setAssignments($assignments) {
        //
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'profile_photo_path' => $this->getProfilePhotoUrl(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
