<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        Helpers\BelongsToManyUser,
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

    protected const HTML_DATE_FORMAT = 'Y-m-d\Th:i:s';

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
    	$this->time1 = $time1;
    }

    public function setTime2($time2) {
    	$this->time2 = $time2;
    }

    public function setTime3($time3) {
    	$this->time3 = $time3;
    }

    public function setTime4($time4) {
    	$this->time4 = $time4;
    }

    public function getTime1() {
    	return date(Rating::HTML_DATE_FORMAT, strtotime($this->time1));
    }

    public function getTime2() {
    	return date(Rating::HTML_DATE_FORMAT, strtotime($this->time2));
    }

    public function getTime3() {
    	return date(Rating::HTML_DATE_FORMAT, strtotime($this->time3));
    }

    public function getTime4() {
    	return date(Rating::HTML_DATE_FORMAT, strtotime($this->time4));
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
    		'name' => $this->getName(),
    		'description' => $this->getDescription(),
    		'time1' => $this->getTime1(),
    		'time2' => $this->getTime2(),
    		'time3' => $this->getTime3(),
    		'time4' => $this->getTime4(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
