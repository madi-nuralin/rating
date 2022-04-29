<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use DB;

use App\Models\Forms\Form;

class Rating extends Model
{
    use HasFactory,
    	Helpers\HasId,
    	Helpers\HasName,
    	Helpers\HasDescription,
        Helpers\HasManyVerifier,
        Helpers\HasManySubmission,
        Helpers\HasManyApprover,
        Helpers\BelongsToManyUserWithIsApproved,
        Helpers\BelongsToManyParameterWithForm;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'time1',
        'time2',
        'time3',
        'time4',
    ];

    protected const HTML_DATE_FORMAT = 'Y-m-d\TH:i';
    protected const MYSQL_DATE_FORMAT = 'Y-m-d H:i:s';

    public function settings() {
    	return $this->hasMany(RatingSetting::class);
    }

    public function parameterTargets() {
        $parameterTargets = collect(
            DB::table('parameters')
                ->select('parameter_target_id')
                ->whereIn('id', $this->parameters()->pluck('parameters.id'))
                ->groupBy('parameter_target_id')
                ->get()
                ->pluck('parameter_target_id')
        );

        if (is_null($parameterTargets)) {
            return null;
        }

        return $parameterTargets->map(function($parameterTarget) {
            return ParameterTarget::find($parameterTarget);
        });
    }

    public function setTime1($time1) {
    	$this->time1 = DateTime::createFromFormat(
            Rating::HTML_DATE_FORMAT, $time1
        )->format(Rating::MYSQL_DATE_FORMAT);
    }

    public function setTime2($time2) {
    	$this->time2 = DateTime::createFromFormat(
            Rating::HTML_DATE_FORMAT, $time2
        )->format(Rating::MYSQL_DATE_FORMAT);
    }

    public function setTime3($time3) {
    	$this->time3 = DateTime::createFromFormat(
            Rating::HTML_DATE_FORMAT, $time3
        )->format(Rating::MYSQL_DATE_FORMAT);
    }

    public function setTime4($time4) {
    	$this->time4 = DateTime::createFromFormat(
            Rating::HTML_DATE_FORMAT, $time4
        )->format(Rating::MYSQL_DATE_FORMAT);
    }

    public function getTime1($dateFormat=null) {
        if (is_null($dateFormat)) {
            return $this->time1;
        }
    	return date($dateFormat, strtotime($this->time1));
    }

    public function getTime2($dateFormat=null) {
        if (is_null($dateFormat)) {
            return $this->time2;
        }
    	return date($dateFormat, strtotime($this->time2));
    }

    public function getTime3($dateFormat=null) {
        if (is_null($dateFormat)) {
            return $this->time3;
        }
    	return date($dateFormat, strtotime($this->time3));
    }

    public function getTime4($dateFormat=null) {
        if (is_null($dateFormat)) {
            return $this->time4;
        }
    	return date($dateFormat, strtotime($this->time4));
    }

    public function getUserScore(User $user, $verificationStatuses = null /*array of ids'*/) {
        $submissions = $this->submissions()->where([
            'user_id' => $user->id
        ])->get();

        if (is_null($verificationStatuses) || empty($verificationStatuses)) {
            return $submissions->sum('score');
        } else {
            $sum = 0;

            foreach ($submissions as $submission) {
                $accepted = true;

                foreach ($submission->verifications as $verification) {
                    if (!in_array($verification->verificationStatus->id, $verificationStatuses)) {
                        $accepted = false;
                        break;
                    }
                }

                if ($accepted) {
                    $sum += $submission->getScore();
                }
            }
            return $sum;
        }
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
    		'description' => $this->getDescription(),
    		'time1' => $this->getTime1(Rating::HTML_DATE_FORMAT),
    		'time2' => $this->getTime2(Rating::HTML_DATE_FORMAT),
    		'time3' => $this->getTime3(Rating::HTML_DATE_FORMAT),
    		'time4' => $this->getTime4(Rating::HTML_DATE_FORMAT),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
