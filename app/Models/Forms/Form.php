<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;

use App\Models\Helpers\HasId;
use App\Models\Helpers\HasName;
use App\Models\Helpers\HasDescription;

class Form extends Model
{
    use HasFactory,
        HasId,
        HasName,
        HasDescription;

    protected $table = 'forms';

    const SCORING_DISABLED = 'disabled';
    const SCORING_BY_CONSTANT = 'by_constant';
    const SCORING_BY_MATH_EXPRESSION = 'by_math_expression';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scoring',
        'score',
        'math_expression'
    ];

    public function settings() {
    	return $this->hasMany(FormSetting::class);
    }

    public function parameter() {
        return $this->belongsTo(Parameter::class);
    }

    public function fields() {
    	return $this->hasMany(FormField::class);
    }

    public function setScoring($scoring) {
        $this->scoring = $scoring;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function setMathExpression($mathExpression) {
        $parser = new StdMathParser();
        $evaluator = new Evaluator();

        $expression = $parser->parse($mathExpression);

        $variables = [];
        foreach ($this->fields()->whereNotNull('variable')->get() as $field) {
            $variables[$field->getVariable()] = rand();
        }

        $evaluator->setVariables($variables);
        $value = $expression->accept($evaluator);

        $this->math_expression = $mathExpression;
    }

    public function setFields($fields) {
        //
    }

    public function getScoring() {
        return $this->scoring;
    }

    public function getScore() {
        return $this->score;
    }

    public function getMathExpression() {
        return $this->math_expression;
    }

    public function getFields() {
    	return $this->fields;
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'scoring' => $this->getScoring(),
            'score' => $this->getScore(),
            'math_expression' => $this->getMathExpression(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
