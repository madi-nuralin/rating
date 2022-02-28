<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Role;
use App\Models\Position;
use App\Models\Department;
use App\Models\EmployementType;
use App\Models\Rating;
use App\Models\Parameter;
use App\Models\ParameterTarget;
use App\Models\VerificationStatus;
use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldOption;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $this->seedRoles();
        $this->seedPositions();
        $this->seedDepartments();
        $this->seedEmployementTypes();
        $this->seedParameterTargets();
        $this->seedParameters();
        $this->seedVerificationStatuses();
    }

    protected function seedRoles() {
        error_log("Seeding: roles");

        $locales = ['en', 'ru'];
    
        $definitions = json_decode(
            file_get_contents(
                resource_path("factories/roles.json")
            ), true
        );

        foreach ($definitions as $definition) {
            $role = Role::create(['context' => $definition['context']]);

            foreach ($locales as $locale) {
                $role->setName($definition[$locale]['name'], $locale);
                $role->setDescription($definition[$locale]['description'], $locale);
            }
            
            $role->save();
        }

        error_log("Seeded:  roles");
    }

    protected function seedDepartments() {
        error_log("Seeding: departments");

        $locales = ['en', 'ru'];
    
        $definitions = json_decode(
            file_get_contents(
                resource_path("factories/departments.json")
            ), true
        );

        foreach ($definitions as $definition) {
            $department = Department::create();

            foreach ($locales as $locale) {
                $department->setName($definition[$locale]['name'], $locale);
                $department->setDescription($definition[$locale]['description'], $locale);
            }
            
            $department->save();
        }

        error_log("Seeded:  departments");
    }

    protected function seedPositions() {
        error_log("Seeding: positions");

        $locales = ['en', 'ru'];

	    $definitions = json_decode(
            file_get_contents(
                resource_path("factories/positions.json")
            ), true
        );

        foreach ($definitions as $definition) {
            $position = Position::create();

            foreach ($locales as $locale) {
                $position->setName($definition[$locale]['name'], $locale);
                $position->setDescription($definition[$locale]['description'], $locale);
            }

            $position->save();
        }

        error_log("Seeded:  positions");
    }

    protected function seedParameterTargets() {
        error_log("Seeding: parameter_targets");

        $locales = ['en', 'ru'];

        $definitions = json_decode(
            file_get_contents(
                resource_path("factories/parameter_targets.json")
            ), true
        );

        foreach ($definitions as $definition) {
            $parameterTarget = ParameterTarget::create();

            foreach ($locales as $locale) {
                $parameterTarget->setName($definition[$locale]['name'], $locale);
                $parameterTarget->setDescription($definition[$locale]['description'], $locale);
            }

            $parameterTarget->save();
        }

        error_log("Seeded:  parameter_targets");
    }

    protected function seedEmployementTypes() {
        error_log("Seeding: employement_types");

        $locales = ['en', 'ru'];

        $definitions = json_decode(
            file_get_contents(
                resource_path("factories/employement_types.json")
            ), true
        );

        foreach ($definitions as $definition) {
            $employementType = EmployementType::create();

            foreach ($locales as $locale) {
                $employementType->setName($definition[$locale]['name'], $locale);
                $employementType->setDescription($definition[$locale]['description'], $locale);
            }

            $employementType->save();
        }

        error_log("Seeded:  employement_types");
    }

    protected function seedParameters() {
        error_log("Seeding: parameters");

        $locales = ['en', 'ru'];

        $definitions = json_decode(
            file_get_contents(
                resource_path("factories/parameters.json")
            ), true
        );

        foreach ($definitions as $definition) {
            $parameter = Parameter::create([
                'parameter_target_id' => $definition['parameter_target']
            ]);

            foreach ($locales as $locale) {
                $parameter->setName($definition[$locale]['name'], $locale);
                $parameter->setDescription($definition[$locale]['description'], $locale);
            }

            if (array_key_exists('forms', $definition)) {
                foreach ($definition['forms'] as $definitionForm) {   
                    $form = Form::create([
                        'scoring' => $definitionForm['scoring']
                    ]);

                    foreach ($locales as $locale) {
                        $form->setName($definitionForm[$locale]['name'], $locale);
                        $form->setDescription($definitionForm[$locale]['description'], $locale);
                    }

                    if (array_key_exists('fields', $definitionForm)) {
                        
                        foreach ($definitionForm['fields'] as $definitionFormField) {
                            $formField = FormField::create([
                                'form_id' => $form->getId(),
                                'type' => $definitionFormField['type']
                            ]);

                            if (array_key_exists('validation_rules', $definitionFormField)) {
                                $formField->setValidationRules($definitionFormField['validation_rules']);
                            }

                            if (array_key_exists('variable', $definitionFormField)) {
                                $formField->setVariable($definitionFormField['variable']);
                            }

                            foreach ($locales as $locale) {
                                $formField->setLabel($definitionFormField[$locale]['label'], $locale);
                            }

                            if ( in_array($formField->getType(), [FormField::SELECT, FormField::MULTISELECT]) ) {
                                foreach ($definitionFormField['options'] as $definitionFormFieldOption) {
                                    $formFieldOption = FormFieldOption::create([
                                        'form_field_id' => $formField->getId()
                                    ]);

                                    if (array_key_exists('score', $definitionFormFieldOption)) {
                                        $formFieldOption->setScore($definitionFormFieldOption['score']);
                                    }

                                    foreach ($locales as $locale) {
                                        $formFieldOption->setName($definitionFormFieldOption[$locale]['name'], $locale);
                                        $formFieldOption->setDescription($definitionFormFieldOption[$locale]['description'], $locale);
                                    }

                                    $formFieldOption->save();
                                }
                            }
                            $formField->save();
                        }
                    }

                    switch ($form->getScoring()) {
                        case Form::SCORING_DISABLED:
                            break;
                        case Form::SCORING_BY_CONSTANT:
                            $form->setScore($definitionForm['score']);
                            break;
                        case Form::SCORING_BY_MATH_EXPRESSION:
                            $form->setMathExpression($definitionForm['math_expression']);
                            break;
                        default:
                            break;
                    }

                    $form->save();
                    $parameter->addForm($form);
                }
            }

            $parameter->save();
        }

        error_log("Seeded:  parameters");
    }

    protected function seedVerificationStatuses() {
        error_log("Seeding: verification_statuses");

        $locales = ['en', 'ru'];
    
        $definitions = json_decode(
            file_get_contents(
                resource_path("factories/verification_statuses.json")
            ), true
        );

        foreach ($definitions as $definition) {
            $verificationStatus = VerificationStatus::create([
                'context' => $definition['context'],
                'color' => $definition['color']
            ]);

            foreach ($locales as $locale) {
                $verificationStatus->setName($definition[$locale]['name'], $locale);
                $verificationStatus->setDescription($definition[$locale]['description'], $locale);
                $verificationStatus->setVerb($definition[$locale]['verb'], $locale);
            }
            
            $verificationStatus->save();
        }

        error_log("Seeded:  verification_statuses");
    }
}
