<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Role;
use App\Models\Position;
use App\Models\Department;
use App\Models\Assessment;
use App\Models\Parameter;

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
        $this->seedRole();
        $this->seedPosition();
        $this->seedDepartment();
        $this->seedAssessment();
        $this->seedParameter();
    }

    protected function seedRole() {
        $locales = ['en', 'ru'];
    
        $definitions = [
            [
                'en' => [
                    'name' => 'Site administrator',
                    'description' => 'A site administrator is a one who is responsible for maintaining the site.'
                ],
                'ru' => [
                    'name' => 'Администратор сайта',
                    'description' => 'Роль для технической поддержки и администрирования сайта'
                ],
                'context' => 'admin'
            ], [
                'en' => [
                    'name' => 'Manager',
                    'description' => 'Site activity manager, staff assessment settings'
                ],
                'ru' => [
                    'name' => 'Управляющий',
                    'description' => 'Управляющий деятельностью сайта, настройка оценивания'
                ],
                'context' => 'manager'
            ], [
                'en' => [
                    'name' => 'Confirmer',
                    'description' => 'Authorized to confirm this assessment'
                ],
                'ru' => [
                    'name' => 'Подтверждающий',
                    'description' => 'Уполномочен подтвердить оценку деятельности персонала'
                ],
                'context' => 'confirmer'
            ],
        ];

        foreach ($definitions as $definition) {
            $role = Role::create(['context' => $definition['context']]);

            foreach ($locales as $locale) {
                $role->setName($definition[$locale]['name'], $locale);
                $role->setDescription($definition[$locale]['description'], $locale);
            }
            
            $role->save();
        }
    }

    protected function seedDepartment() {
        $locales = ['en', 'ru'];
    
        $definitions = [
            [
                'en' => [
                    'name' => 'Media communications and history of Kazakhstan',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Кафедра Медиакоммуникации и Истории Казахстана',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Computer Engineering and Information Security',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Кафедра Компьютерная инженерия и информационная безопасность',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Mathematical Computer Modeling',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Кафедра Математическое компьютерное моделирование',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Economics and business',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Кафедра Экономика и бизнес',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Radio Engineering, Electronics and Telecommunications',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Кафедра Радиотехника, электроника и телекоммуникации',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Department of Languages',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Кафедра языков',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Military Training Department',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Военная кафедра',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Information Systems',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Кафедра Информационные системы',
                    'description' => ''
                ]
            ]
        ];

        foreach ($definitions as $definition) {
            $department = Department::create();

            foreach ($locales as $locale) {
                $department->setName($definition[$locale]['name'], $locale);
                $department->setDescription($definition[$locale]['description'], $locale);
            }
            
            $department->save();
        }
    }

    protected function seedPosition() {
        $locales = ['en', 'ru'];

	    $definitions = [
		    [
                'en' => [
                    'name' => 'Professor',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Профессор',
                    'description' => ''
                ]
		    ], [
			    'en' => [
                    'name' => 'Assistant Professor',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Ассистент-Профессор',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Associate professor',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Ассоциированный профессор',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Senior Lecturer',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Сениор-лектор',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Lecturer',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Лектор',
                    'description' => ''
                ]
            ], [
                'en' => [
                    'name' => 'Tutor',
                    'description' => ''
                ],
                'ru' => [
                    'name' => 'Тьютор',
                    'description' => ''
                ]
            ]
        ];

        foreach ($definitions as $definition) {
            $position = Position::create();

            foreach ($locales as $locale) {
                $position->setName($definition[$locale]['name'], $locale);
                $position->setDescription($definition[$locale]['description'], $locale);
            }

            $position->save();
        }
    }

    protected function seedAssessment() {
        $locales = ['en', 'ru'];

        $definitions = [
            [
                'en' => [
                    'name' => 'Assessment of the effective performance of the teaching staff for 2021-2022',
                    'description' => 'Regulations on the assessment of the effective performance of the teaching staff of JSC "International University of Information Technologies"'
                ],
                'ru' => [
                    'name' => 'Оценка эффективной деятельности профессорско-преподавательского состава за 2021-2022 гг.',
                    'description' => 'Положение по оценке эффективной деятельности профессорско-преподавательского состава АО «Международный Университет Информационных Технологий»'
                ],
                'valid_from' => '2021-09-01',
                'valid_to' => '2022-06-01'
            ], [
                'en' => [
                    'name' => 'Assessment of the effective performance of the heads of departments for 2021-2022',
                    'description' => 'Regulations on the assessment of the effective activities of the heads of departments of JSC "International University of Information Technologies"'
                ],
                'ru' => [
                    'name' => 'Оценка эффективной деятельности заведующих кафедр за 2021-2022 гг.',
                    'description' => 'Положение по оценке эффективной деятельности заведующих кафедр АО «Международный Университет Информационных Технологий»'
                ],
                'valid_from' => '2021-09-01',
                'valid_to' => '2022-06-01'
            ],
        ];

        foreach ($definitions as $definition) {
            $assessment = Assessment::create();

            foreach ($locales as $locale) {
                $assessment->setName($definition[$locale]['name'], $locale);
                $assessment->setDescription($definition[$locale]['description'], $locale);
            }
            
            $assessment->setValidFrom($definition['valid_from']);
            $assessment->setValidTo($definition['valid_to']);

            $assessment->save();
        }
    }

    protected function seedParameter() {
        $locales = ['en', 'ru'];

        $definitions = [
            [
                'en' => [
                    'name' => 'Number of published scientific works:',
                    'description' => 'Number of scientific papers published in international peer-reviewed scientific journals in the 1st and 2nd quartile according to Journal Citation Reports'
                ],
                'ru' => [
                    'name' => 'Количество опубликованных научных работ:',
                    'description' => 'Количество опубликованных научных работ в международных рецензируемых научных журналах, входящих в 1 и 2 квартиль по данным Journal Citation Reports'
                ]
            ]
        ];

        foreach ($definitions as $definition) {
            $parameter = Parameter::create();

            foreach ($locales as $locale) {
                $parameter->setName($definition[$locale]['name'], $locale);
                $parameter->setDescription($definition[$locale]['description'], $locale);
            }

            $parameter->save();
        }
    }
}
