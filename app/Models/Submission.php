<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;

use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldOption;
use App\Models\Forms\FormFieldResponce;

class Submission extends Model
{
    use HasFactory,
    	Helpers\HasId;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'rating_id',
        'parameter_id',
        'score'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function rating() {
    	return $this->belongsTo(Rating::class);
    }

    public function parameter() {
    	return $this->belongsTo(Parameter::class);
    }

    public function submissionProlongations() {
    	return $this->hasMany(SubmissionProlongation::class);
    }

    public function verifications() {
        return $this->hasMany(Verification::class);
    }

    public function formFieldResponces() {
        return $this->belongsToMany(FormFieldResponce::class);
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function setUser(User $user) {
    	$this->user()->associate($user);
    }

    public function setRating(Rating $rating) {
    	$this->rating()->associate($rating);
    }

    public function setParameter(Parameter $parameter) {
    	$this->parameter->associate($parameter);
    }

    public function setSubmissionProlongations() {
    	// 
    }

    public function setFormFieldResponces() {
        //
    }

    public function getScore(): float {
        return $this->score;
    }

    public function getUser() {
    	return $this->user;
    }

    public function getRating() {
    	return $this->rating;
    }

    public function getParameter() {
    	return $this->parameter;
    }

    public function getSubmissionProlongations() {
    	return $this->submissionProlongations;
    }

    public function getFormFieldResponces() {
        return $this->formFieldResponces;
    }

    public function addFormFieldResponce(FormFieldResponce $formFieldResponce) {
        $this->formFieldResponces()->attach($formFieldResponce->id);
    }

    public function deleteFormFieldResponce(FormFieldResponce $formFieldResponce) {
        $this->formFieldResponces()->detach($formFieldResponce->id);
    }

    public function createFormFieldResponce(FormField $formField, $value) {
        $formFieldResponce = $formField->createResponce();
        $formFieldResponce->setValue($value);
        $formFieldResponce->save();
        $this->addFormFieldResponce($formFieldResponce);
        $this->save();

        return $formFieldResponce;
    }

    public function updateScoreByFormFieldResponces() {
        $form = $this->parameter->activeForm;

        if (! $form) {
            return;
        }

        switch ($form->getScoring()) {
            case Form::SCORING_DISABLED:
                # code...
                break;

            case Form::SCORING_BY_CONSTANT:
                $this->setScore($form->getScore());
                break;

            case Form::SCORING_BY_MATH_EXPRESSION:
                $parser = new StdMathParser();
                $evaluator = new Evaluator();
                
                if (is_null($form->getMathExpression())) {
                    $this->setScore(0);
                    return;
                }

                $expression = $parser->parse($form->getMathExpression());
                $variables = [];

                foreach ($this->formFieldResponces as $formFieldResponce) {
                    $formField = $formFieldResponce->formField;

                    if (!is_null($formField->getVariable())) {
                        if ($formField->getType() == FormField::NUMBER) {
                            $variables[$formField->getVariable()] = $formFieldResponce->getValue();
                        } else if ($formField->getType() == FormField::SELECT) {
                            $formFieldOption = FormFieldOption::find($formFieldResponce->getValue());
                            if (! $formFieldOption) {
                                continue;
                            }
                            $variables[$formField->getVariable()] = $formFieldOption->getScore();
                        } else {
                            continue;
                        }
                    }
                }

                $evaluator->setVariables($variables);
                $value = $expression->accept($evaluator);

                $this->setScore($value);
                break;
            
            default:
                # code...
                break;
        }
    }

    public static function updateHelper(Request $request, $id, $validateWithBag)
    {
        $input = $request->all();

        $submission = Submission::findOrFail($id);
        $parameter = $submission->parameter;
        $rating = $submission->rating;
        $form = $rating->parameterForm($parameter);

        if ($form) {
            $rules = [];

            foreach ($form->fields as $formField) {
                if ($formField->getType() == FormField::FILE) {

                    $formFieldResponce = $submission->formFieldResponces()
                                                    ->where('form_field_id', $formField->id)
                                                    ->first();

                    if (! is_null($formFieldResponce)) {
                        if (! is_null($formFieldResponce->getValue())) {
                            if ($input["field{$formField->id}"] == $formFieldResponce->getValue()) {
                                continue;
                            }
                        }
                    }
                }
                $rules["field{$formField->id}"] = $formField->rules();
            }

            Validator::make($input, $rules)->validateWithBag($validateWithBag);

            foreach ($form->fields as $formField) {
                $formFieldResponce = $submission->formFieldResponces()
                                                ->where('form_field_id', $formField->id)
                                                ->first();
                    
                if (is_null($formFieldResponce)) {
                    $submission->createFormFieldResponce($formField, $input["field{$formField->id}"] ?? '');
                } else {                          
                    $formFieldResponce->setValue($input["field{$formField->id}"] ?? '');
                }
            }

            $submission->updateScoreByFormFieldResponces();
            $submission->save();
        }
    }

    public function toArray() {
    	return [
    		'id' => $this->getId(),
            'score' => $this->getScore(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
