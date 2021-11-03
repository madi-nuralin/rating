<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forms\Form;

class Parameter extends Model
{
    use HasFactory, Helpers\SettingHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'score',
    ];

    public function settings() {
        return $this->hasMany(ParameterSetting::class);
    }

    public function assessments() {
        return $this->belongsToMany(Assessment::class);
    }

    public function rules() {
        return $this->belongsToMany(Rule::class);
    }

    public function form() {
        return $this->belongsTo(Form::class);
    }

    public function getId() {
        return $this->id;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function getName($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'name'
        );
    }

    public function setName($name, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'name',
            $name
        );
    }

    public function getDescription($locale=null) {
        return $this->getSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description'
        );
    }

    public function setDescription($description, $locale=null) {
        $this->updateSettingValue(
            isset($locale) ? $locale : app()->currentLocale(),
            'string',
            'description',
            $description
        );
    }

    public function getAssessments() {
        return $this->assessments->map(function($assessment) {
            return $assessment->toArray();
        });
    }

    public function getRules() {
        return $this->rules->map(function($rule) {
            return $rule->toArray();
        });
    }

    public function getForm() {
        return $this->form->toArray();
    }

    public function setForm($form) {
        $this->form()->save($form);
    }

    public function toArray() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'score' => $this->getScore(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
