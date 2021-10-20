<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Role;
use App\Models\Position;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $definitions = [
            ['manager']
        ];

        foreach ($definitions as $definition) {
            $role = Role::create();
            $role->setName($definition[0]);
            $role->save();
        }

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);     

        User::factory(10)->create();

        $this->seedPosition();
        $this->seedDepartment();
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

}
