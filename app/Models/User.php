<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Helpers\SettingHelper, Helpers\FileHelper;

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

    public function supervisingAssessments() {
        return $this->belongsToMany(Assessment::class, 'assessment_supervisor', 'user_id', 'assessment_id');
    }

    public function getId() {
        return $this->id;
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

    public function setFirstname($firstname) {
        $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'firstname',
            $firstname
        );
    }

    public function getFirstname() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'firstname'
        );
    }

    public function setLastname($lastname) {
        $this->updateSettingValue(
            app()->currentLocale(),
            'string',
            'lastname',
            $lastname
        );
    }

    public function getLastname() {
        return $this->getSettingValue(
            app()->currentLocale(),
            'string',
            'lastname'
        );
    }

    public function createdAt() {
        return $this->created_at;
    }

    public function updatedAt() {
        return $this->updated_at;
    }

    public function getRoles() {
        return $this->roles->map(function($role) {
            return $role->toArray();
        });
    }

    public function getSupervisingAssessments() {
        return $this->supervisingAssessments->map(function($supervisingAssessment) {
            return $supervisingAssessment->toArray();
        });
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'profile_photo_path' => $this->getProfilePhotoUrl(),
            'created_at' => $this->createdAt(),
            'updated_at' => $this->updatedAt(),
        ];
    }
}
