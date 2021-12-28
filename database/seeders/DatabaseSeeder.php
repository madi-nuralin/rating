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
use App\Models\EmployementType;
use App\Models\Rating;
use App\Models\ParameterTarget;
use App\Models\Parameter;
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
        //User::factory(10)->create();
        //$this->seedRole();
        //$this->seedPosition();
        //$this->seedDepartment();
        //$this->seedEmployementType();
        //$this->seedAssessment();
        //$this->seedParameterTarget();
        $this->seedParameter();
    }

    protected function seedRole() {
        $locales = ['en', 'ru'];
    
        $definitions = [
            [
                'en' => [
                    'name' => 'Administrator',
                    'description' => 'A site administrator is a one who is responsible for maintaining the site.'
                ],
                'ru' => [
                    'name' => 'Администратор',
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
                    'name' => 'Verifier',
                    'description' => 'Authorized to confirm this assessment'
                ],
                'ru' => [
                    'name' => 'Подтверждающий',
                    'description' => 'Уполномочен подтвердить оценку деятельности персонала'
                ],
                'context' => 'verifier'
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
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Кафедра Медиакоммуникации и Истории Казахстана',
                    'description' => 'Кафедра'
                ]
            ], [
                'en' => [
                    'name' => 'Computer Engineering and Information Security',
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Кафедра Компьютерная инженерия и информационная безопасность',
                    'description' => 'Кафедра'
                ]
            ], [
                'en' => [
                    'name' => 'Mathematical Computer Modeling',
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Кафедра Математическое компьютерное моделирование',
                    'description' => 'Кафедра'
                ]
            ], [
                'en' => [
                    'name' => 'Economics and business',
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Кафедра Экономика и бизнес',
                    'description' => 'Кафедра'
                ]
            ], [
                'en' => [
                    'name' => 'Radio Engineering, Electronics and Telecommunications',
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Кафедра Радиотехника, электроника и телекоммуникации',
                    'description' => 'Кафедра'
                ]
            ], [
                'en' => [
                    'name' => 'Department of Languages',
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Кафедра языков',
                    'description' => 'Кафедра'
                ]
            ], [
                'en' => [
                    'name' => 'Military Training Department',
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Военная кафедра',
                    'description' => 'Кафедра'
                ]
            ], [
                'en' => [
                    'name' => 'Information Systems',
                    'description' => 'Deparment'
                ],
                'ru' => [
                    'name' => 'Кафедра Информационные системы',
                    'description' => 'Кафедра'
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
                    'description' => 'Position of a researcher or teacher'
                ],
                'ru' => [
                    'name' => 'Профессор',
                    'description' => 'Должность научного сотрудника или преподавателя'
                ]
		    ], [
			    'en' => [
                    'name' => 'Assistant Professor',
                    'description' => 'Junior professor; usually the first position a successful graduate student receives.'
                ],
                'ru' => [
                    'name' => 'Ассистент-профессор',
                    'description' => 'Младший профессор; обычно первая должность, которую получает успешный выпускник аспирантуры.'
                ]
            ], [
                'en' => [
                    'name' => 'Associate professor',
                    'description' => 'Research and teaching position (title) in some, mainly Russian-speaking, countries comparable to the position (title) of associate professor in the educational system'
                ],
                'ru' => [
                    'name' => 'Ассоциированный профессор',
                    'description' => 'Научно-преподавательская должность (звание) в некоторых, преимущественно англоязычных, странах, сопоставимая с должностью (званием) доцента в образовательной системе'
                ]
            ], [
                'en' => [
                    'name' => 'Senior Lecturer',
                    'description' => 'Лектор высокого академического уровня'
                ],
                'ru' => [
                    'name' => 'Сениор-лектор',
                    'description' => 'Speaker which is at a high academic level '
                ]
            ], [
                'en' => [
                    'name' => 'Lecturer',
                    'description' => 'Lecturer'
                ],
                'ru' => [
                    'name' => 'Лектор',
                    'description' => 'Лектор'
                ]
            ], [
                'en' => [
                    'name' => 'Tutor',
                    'description' => 'A teacher who conducts additional classes with a student or multiple students daily, weekly, or monthly'
                ],
                'ru' => [
                    'name' => 'Тьютор',
                    'description' => 'Преподаватель, который проводит дополнительные занятия с учеником или с несколькими учениками ежедневно, еженедельно или ежемесячно'
                ]
            ], [
                'en' => [
                    'name' => 'Head of department',
                    'description' => 'Head of the department in higher educational institutions'
                ],
                'ru' => [
                    'name' => 'Заведующий кафедры',
                    'description' => 'Руководитель кафедры в высших учебных заведениях'
                ]
            ],
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

    /*protected function seedRating() {
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
            $rating = Rating::create();

            foreach ($locales as $locale) {
                $rating->setName($definition[$locale]['name'], $locale);
                $rating->setDescription($definition[$locale]['description'], $locale);
            }
            
            $rating->setValidFrom($definition['valid_from']);
            $rating->setValidTo($definition['valid_to']);

            $rating->save();
        }
    }*/

    protected function seedParameterTarget() {
        $locales = ['en', 'ru'];

        $definitions = [
            [
                'en' => [
                    'name' => 'Educational-methodical work',
                    'description' => 'Methodical work is a set of activities aimed at providing the educational process with educational and methodological documentation, conducting classroom and other types of classes with students at a high theoretical and scientific level, improving the pedagogical skills of teachers.'
                ],
                'ru' => [
                    'name' => 'Учебно-методическая работа',
                    'description' => 'Методическая работа представляет собой комплекс мероприятий, направленных на обеспечение учебного процесса учебно-методической документацией, проведение аудиторных и других видов занятий со студентами на высоком теоретическом и научном уровне, повышение педагогического мастерства преподавателей.'
                ]
            ], [
                'en' => [
                    'name' => 'Research work',
                    'description' => 'The research activity of a teacher is a conscious, independent and responsibly carried out practical activity aimed at increasing pedagogical professionalism.'
                ],
                'ru' => [
                    'name' => 'Научно-исследовательскя работа',
                    'description' => 'Исследовательская деятельность педагога – это осознанная, самостоятельная и ответственно осуществляемая практическая деятельность, направленная на повышение педагогического профессионализма.'
                ]
            ], [
                'en' => [
                    'name' => 'Social educational work',
                    'description' => 'Social work in an inextricable connection with educational work involves the organization of interaction with students, including with their socially unprotected parameterTarget, in order to identify their social and living conditions, emerging difficulties, to introduce expedient changes and transformations in their life.'
                ],
                'ru' => [
                    'name' => 'Социально-воспитательная работа',
                    'description' => 'Социальная работа в неразрывной связи с воспитательной работой предполагает организацию взаимодействия со студентами, в том числе и с социально незащищённой их категорией, с целью выявления их социально-бытовых условий, возникающих трудностей, привнесения целесообразных изменений и преобразований в их жизнедеятельность.'
                ]
            ], [
                'en' => [
                    'name' => 'Expert-analytical, social-activities, mass media',
                    'description' => 'Expert-analytical, social-activities, mass media'
                ],
                'ru' => [
                    'name' => 'Экспертно-аналитическая, общественная-деятельность, СМИ',
                    'description' => 'Экспертно-аналитическая, общественная-деятельность, СМИ'
                ]
            ], [
                'en' => [
                    'name' => 'Qualification',
                    'description' => 'Qualification'
                ],
                'ru' => [
                    'name' => 'Квалификация',
                    'description' => 'Квалификация'
                ]
            ], [
                'en' => [
                    'name' => 'International activity',
                    'description' => 'International activity'
                ],
                'ru' => [
                    'name' => 'Международная деятельность',
                    'description' => 'Международная деятельность'
                ]
            ], [
                'en' => [
                    'name' => 'Recruiting applicants. Activities for the recruitment of a contingent of students',
                    'description' => 'Recruiting applicants. Activities for the recruitment of a contingent of students'
                ],
                'ru' => [
                    'name' => 'Рекрутинг абитуриентов. Деятельность по набору контингента обучающихся',
                    'description' => 'Рекрутинг абитуриентов. Деятельность по набору контингента обучающихся'
                ]
            ], [
                'en' => [
                    'name' => 'The qualification composition of the teaching staff of the department',
                    'description' => 'The qualification composition of the teaching staff of the department'
                ],
                'ru' => [
                    'name' => 'Квалификационный состав ППС кафедры',
                    'description' => 'Квалификационный состав ППС кафедры.'
                ]
            ], [
                'en' => [
                    'name' => 'Organization of study work',
                    'description' => 'Organization of study work'
                ],
                'ru' => [
                    'name' => 'Организация учебой работы',
                    'description' => 'Организация учебой работы.'
                ]
            ], [
                'en' => [
                    'name' => 'Organization of research work at the department',
                    'description' => 'Organization of research work at the department'
                ],
                'ru' => [
                    'name' => 'Организация НИР на кафедре',
                    'description' => 'Организация НИР на кафедре.'
                ]
            ], [
                'en' => [
                    'name' => 'Organizational, educational, career guidance image work',
                    'description' => 'Organizational, educational, career guidance image work'
                ],
                'ru' => [
                    'name' => 'Организационно-воспитательная, профоориентационная имиджевая работа',
                    'description' => 'Организационно-воспитательная, профоориентационная имиджевая работа.'
                ]
            ], [
                'en' => [
                    'name' => 'Social educational, career guidance image work',
                    'description' => 'Social educational, career guidance image workю'
                ],
                'ru' => [
                    'name' => 'Социально-воспитательная, профоориентационная имиджевая работа',
                    'description' => 'Социально-воспитательная, профоориентационная имиджевая работа.'
                ]
            ],
        ];

        foreach ($definitions as $definition) {
            $parameterTarget = ParameterTarget::create();

            foreach ($locales as $locale) {
                $parameterTarget->setName($definition[$locale]['name'], $locale);
                $parameterTarget->setDescription($definition[$locale]['description'], $locale);
            }

            $parameterTarget->save();
        }
    }

    protected function seedEmployementType() {
        $locales = ['en', 'ru'];

        $definitions = [
            [
                'en' => [
                    'name' => 'Staffed',
                    'description' => 'Staffed.'
                ],
                'ru' => [
                    'name' => 'Штатный',
                    'description' => 'Штатный.'
                ]
            ], [
                'en' => [
                    'name' => 'Internal part-time',
                    'description' => 'Internal part-time.'
                ],
                'ru' => [
                    'name' => 'Внутренний совместитель',
                    'description' => 'Внутренний совместитель.'
                ]
            ], [
                'en' => [
                    'name' => 'Side job',
                    'description' => 'Side job.'
                ],
                'ru' => [
                    'name' => 'Совместитель со стороны',
                    'description' => 'Совместитель со стороны.'
                ]
            ]
        ];

        foreach ($definitions as $definition) {
            $employementType = EmployementType::create();

            foreach ($locales as $locale) {
                $employementType->setName($definition[$locale]['name'], $locale);
                $employementType->setDescription($definition[$locale]['description'], $locale);
            }

            $employementType->save();
        }
    }

    protected function seedParameter() {
        $locales = ['en', 'ru'];

        $definitions = [
            [
                'en' => [
                    'name' => 'Publications in international peer-reviewed scientific journals in the 1st and 2nd quartile',
                    'description' => 'Publications in international peer-reviewed scientific journals included in 1 and 2 quarters according to Journal Citation Reports by Clarivate Analytics (Clarivate Analytics), or having in the database Scopus data CiteScore percentile not less than 65 in at least one of the scientific areas, in the field of social and humanitarian sciences, in journals indexed in the Web of Science Core Collection database (The Wep of Science Core Calculation) (Arts and Humanities Citation Index (Arts and Humanitis City Index), Science Citation Index Expanded (Science City Index Expanded), Social Sciences Citation Index (Link Science City Index)), by Clarivate Analytics and of type Article, Review or Article in Press'
                ],
                'ru' => [
                    'name' => 'Публикации в международных рецензируемых науч-ных журналах, входящих в 1 и 2 квартиль',
                    'description' => 'Публикации в международных рецензируемых науч-ных журналах, входящих в 1 и 2 квар-тиль по данным Journal Citation Reports (Джоурнал Ситэйшн Рэпортс) компании Clarivate Analytics (Кларивэйт Анали-тикс), или имеющих в базе данных Scopus (Скопус) показатель процентиль по CiteScore (СайтСкор) не менее 65 хотя бы по одной из научных областей, в об-ласти социальных и гуманитарных наук, в журналах, индексируемых в базе дан-ных Web of Science Core Collection (Уэп оф Сайнс Кор Калэкшн) (Arts and Humanities Citation Index (Артс энд Хюманитис Ситэйшн Индекс), Science Citation Index Expanded (Сайнс Ситэйшн Индекс Экспандэд), Social Sciences Citation Index (Сошл Сайнс Ситиэйшн Индекс)), компании Clarivate Analytics (Кларивэйт Аналитикс) и имеющие тип Article (Статья), Review (Обзор) илиArticle in Press (Статья в печати)'
                ],
                'target' => 2,
                'score' => 4,
                'form' => [
                    'fields' => [
                        [
                            'type' => 'text',
                            'en' => [
                                'name' => 'Article title'
                            ],
                            'ru' => [
                                'name' => 'Название статьи'
                            ]
                        ], [
                            'type' => 'text',
                            'en' => [
                                'name' => 'Article abstract'
                            ],
                            'ru' => [
                                'name' => 'Аннотация статьи'
                            ]
                        ], [
                            'en' => [
                                'name' => 'Publication journal'
                            ],
                            'ru' => [
                                'name' => 'Журнал публикаций'
                            ],
                            'type' => 'select',
                            'options' => [
                                [
                                    'en' => [
                                        'name' => 'IEEE Xplore Digital Library',
                                        'description' => 'IEEE Xplore Digital Library'
                                    ],
                                    'ru' => [
                                        'name' => 'Цифровая библиотека IEEE Xplore',
                                        'description' => 'Цифровая библиотека IEEE Xplore, исследовательская база данных для поиска и доступа к журнальным статьям'
                                    ]
                                ], [
                                    'en' => [
                                        'name' => 'International Journal of Information and Communication Technology',
                                        'description' => 'International Journal of Information and Communication Technology'
                                    ],
                                    'ru' => [
                                        'name' => 'Международный журнал информационных и коммуникационных технологий',
                                        'description' => 'Международный журнал информационных и коммуникационных технологий'
                                    ]
                                ]
                            ]
                        ], [
                            'en' => [
                                'name' => 'Article language'
                            ],
                            'ru' => [
                                'name' => 'Язык статьи'
                            ],
                            'type' => 'multiselect',
                            'options' => [
                                [
                                    'en' => [
                                        'name' => 'English',
                                        'description' => 'English'
                                    ],
                                    'ru' => [
                                        'name' => 'Англииский',
                                        'description' => 'Англииский'
                                    ]
                                ], [
                                    'en' => [
                                        'name' => 'Russian',
                                        'description' => 'Russian'
                                    ],
                                    'ru' => [
                                        'name' => 'Русский',
                                        'description' => 'Русский'
                                    ]
                                ]
                            ]
                        ], [
                            'type' => 'file',
                            'en' => [
                                'name' => 'Upload article text'
                            ],
                            'ru' => [
                                'name' => 'Загрузите текст статьи'
                            ]
                        ]
                    ]
                ]
            ], [
                'en' => [
                    'name' => 'Publications in 3 quartile international peer-reviewed scientific journals',
                    'description' => 'Publications in international peer-reviewed scientific journals included in the 3rd quartile according to Journal Citation Reports by Clarivate Analytics, or having a percentile index of at least 35 percentile in the Scopus database (Scopus) for at least one of the scientific fields, social sciences and humanities, in journals indexed in the Web of Science Core Collection database (Arts and Humanities Citation Index (Arts and Humanities City Index), Science Citation Index Expanded (Science City Expanded Index, Social Sciences Citation Index), by Clarivate Analytics and of type Article, Review or Article in Press'
                ],
                'ru' => [
                    'name' => 'Публикации в международных рецензируемых научных журналах, входящих в 3 квартиль',
                    'description' => 'Публикации в международных рецензируемых научных журналах, входящих в 3 квартиль по данным Journal Citation Reports (Джоур-нал Ситэйшн Рэпортс) компании Clarivate Analytics (Кларивэйт Аналитикс), или имеющих в базе данных Scopus (Скопус) показатель процентиль не менее 35 хотя бы по одной из научных областей, в области социальных и гуманитарных наук, в журналах, индексируемых в базе данных Web of Science Core Collection (Уэп оф Сайнс Кор Калэкшн) (Arts and Humanities Citation Index (Артс энд Хюманитис Ситэйшн Индекс), Science Citation Index Expanded (Сайнс Ситэйшн Индекс Экспандэд), Social Sciences Citation Index (Сошл Сайнс Ситиэйшн Индекс)), компании Clarivate Analytics (Кларивэйт Аналитикс) и имеющие тип Article (Статья), Review (Обзор) или Article in Press (Статья в печати)'
                ],
                'target' => 2,
                'score' => 3,
                'form' => [
                    'fields' => [
                        [
                            'type' => 'text',
                            'en' => [
                                'name' => 'Article title'
                            ],
                            'ru' => [
                                'name' => 'Название статьи'
                            ]
                        ], [
                            'type' => 'text',
                            'en' => [
                                'name' => 'Article abstract'
                            ],
                            'ru' => [
                                'name' => 'Аннотация статьи'
                            ]
                        ], [
                            'en' => [
                                'name' => 'Publication journal'
                            ],
                            'ru' => [
                                'name' => 'Журнал публикаций'
                            ],
                            'type' => 'select',
                            'options' => [
                                [
                                    'en' => [
                                        'name' => 'IEEE Xplore Digital Library',
                                        'description' => 'IEEE Xplore Digital Library'
                                    ],
                                    'ru' => [
                                        'name' => 'Цифровая библиотека IEEE Xplore',
                                        'description' => 'Цифровая библиотека IEEE Xplore, исследовательская база данных для поиска и доступа к журнальным статьям'
                                    ]
                                ], [
                                    'en' => [
                                        'name' => 'International Journal of Information and Communication Technology',
                                        'description' => 'International Journal of Information and Communication Technology'
                                    ],
                                    'ru' => [
                                        'name' => 'Международный журнал информационных и коммуникационных технологий',
                                        'description' => 'Международный журнал информационных и коммуникационных технологий'
                                    ]
                                ]
                            ]
                        ], [
                            'en' => [
                                'name' => 'Article language'
                            ],
                            'ru' => [
                                'name' => 'Язык статьи'
                            ],
                            'type' => 'multiselect',
                            'options' => [
                                [
                                    'en' => [
                                        'name' => 'English',
                                        'description' => 'English'
                                    ],
                                    'ru' => [
                                        'name' => 'Английский',
                                        'description' => 'Английский'
                                    ]
                                ], [
                                    'en' => [
                                        'name' => 'Russian',
                                        'description' => 'Russian'
                                    ],
                                    'ru' => [
                                        'name' => 'Русский',
                                        'description' => 'Русский'
                                    ]
                                ]
                            ]
                        ], [
                            'type' => 'file',
                            'en' => [
                                'name' => 'Upload article text'
                            ],
                            'ru' => [
                                'name' => 'Загрузите текст статьи'
                            ]
                        ]
                    ]
                ]
            ], [
                'en' => [
                    'name' => 'Clarivate Analytics Journal Citation Reports or Scopus publications without quartile and percentile',
                    'description' => 'Clarivate Analytics Journal Citation Reports or Scopus publications without quartile and percentile'
                ],
                'ru' => [
                    'name' => 'Публикации в изданиях, входящих в базу данных Journal Citation Reports  (Жорнал Цитэйшэн Репортс) компании Clarivate Analytics (Кларивэйт Аналитикс)  или Scopus без показателей квартиля и про-центиля',
                    'description' => 'Публикации в изданиях, входящих в базу данных Journal Citation Reports  (Жорнал Цитэйшэн Репортс) компании Clarivate Analytics (Кларивэйт Аналитикс)  или Scopus без показателей квартиля и про-центиля'
                ],
                'target' => 2,
                'score' => 4
            ], [
                'en' => [
                    'name' => 'Participation in funded research programs and projects funded: from the state budget (GF, PCF)',
                    'description' => 'Participation in funded research programs and projects funded: from the state budget (GF, PCF)'
                ],
                'ru' => [
                    'name' => 'Участие в финансируемых научно-исследовательских Программах и проектах, финансируемых: из средств государственного бюджета (ГФ, ПЦФ)',
                    'description' => 'Участие в финансируемых научно-исследовательских Программах и проектах, финансируемых: из средств государственного бюджета (ГФ, ПЦФ)'
                ],
                'target' => 2,
                'score' => 0,
                'form' => [
                    'fields' => [
                        [
                            'type' => 'select',
                            'en' => [
                                'name' => 'Article title'
                            ],
                            'ru' => [
                                'name' => 'Название статьи'
                            ],
                            'options' => [
                                [
                                    'en' => [
                                        'name' => 'Scientific supervisor of the PCF project',
                                        'description' => 'Scientific supervisor of the PCF project'
                                    ],
                                    'ru' => [
                                        'name' => 'Научный руководитель проекта ПЦФ',
                                        'description' => 'Научный руководитель проекта ПЦФ'
                                    ],
                                    'score' => 100
                                ], [
                                    'en' => [
                                        'name' => 'Scientific supervisor of the GF project',
                                        'description' => 'Scientific supervisor of the GF project'
                                    ],
                                    'ru' => [
                                        'name' => 'Научный руководитель проекта ГФ',
                                        'description' => 'Научный руководитель проекта ГФ'
                                    ],
                                    'score' => 70
                                ], [
                                    'en' => [
                                        'name' => 'Research Group Member',
                                        'description' => 'Research Group Member'
                                    ],
                                    'ru' => [
                                        'name' => 'Членисследовательской группы',
                                        'description' => 'Членисследовательской группы'
                                    ],
                                    'score' => 25
                                ]
                            ]
                        ], [
                            'en' => [
                                'name' => 'A copy of the contract and staffing table'
                            ],
                            'ru' => [
                                'name' => 'Копия договора и штатного расписания'
                            ],
                            'type' => 'file'
                        ]
                    ]
                ]
            ], [
                'en' => [
                    'name' => 'Publications in the materials of international scientific conferences (Proceedings), indexed in the international database Scopus or Clarivate',
                    'description' => 'Publications in the materials of international scientific conferences (Proceedings), indexed in the international database Scopus or Clarivate'
                ],
                'ru' => [
                    'name' => 'Публикации в материалах международных научных конференций (Proceedings),  индексируе-мых в международной базе данных Scopus или Clarivate ',
                    'description' => 'Публикации в материалах международных научных конференций (Proceedings),  индексируе-мых в международной базе данных Scopus или Clarivate'
                ],
                'target' => 2,
                'score' => 5
            ], [
                'en' => [
                    'name' => 'Basic education of the teaching staff of the department is 100% consistent with the profile of the department',
                    'description' => 'Basic education of the teaching staff of the department is 100% consistent with the profile of the department'
                ],
                'ru' => [
                    'name' => 'Базовое образование ППС кафедры на 100% соответствует профилю кафедры',
                    'description' => 'Базовое образование ППС кафедры на 100% соответствует профилю кафедры'
                ],
                'target' => 8,
                'score' => 7
            ], [
                'en' => [
                    'name' => 'The share of the teaching staff of the department with academic degrees and titles meets the established requirements',
                    'description' => 'The share of the teaching staff of the department with academic degrees and titles meets the established requirements'
                ],
                'ru' => [
                    'name' => 'Доля ППС кафедры с учеными степенями и званиями отвечает установленным требованиям',
                    'description' => 'Доля ППС кафедры с учеными степенями и званиями отвечает установленным требованиям'
                ],
                'target' => 8,
                'score' => 5
            ]   
        ];

        foreach ($definitions as $definition) {
            $form = new Form();
            $form->save();

            $parameter = Parameter::create([
                'form_id' => $form->getId(),
                'parameter_target_id' => $definition['target']
            ]);

            foreach ($locales as $locale) {
                $parameter->setName($definition[$locale]['name'], $locale);
                $parameter->setDescription($definition[$locale]['description'], $locale);
            }

            if (array_key_exists('score', $definition)) {
                $parameter->setScore($definition['score']);
            }

            if (array_key_exists('form', $definition)) {

                foreach ($definition['form']['fields'] as $field) {
                    $formField = FormField::create([
                        'form_id' => $parameter->form->getId(),
                        'type' => $field['type']
                    ]);

                    foreach ($locales as $locale) {
                        $formField->setName($field[$locale]['name'], $locale);
                    }

                    if ( in_array($formField->getType(), ['select', 'multiselect']) ) {
                        foreach ($field['options'] as $option) {
                            $formFieldOption = FormFieldOption::create([
                                'form_field_id' => $formField->getId()
                            ]);
                            foreach ($locales as $locale) {
                                $formFieldOption->setName($option[$locale]['name'], $locale);
                                $formFieldOption->setDescription($option[$locale]['description'], $locale);
                            }
                            if (array_key_exists('score', $option))
                                $formFieldOption->setScore($option['score']);
                            $formFieldOption->save();
                        }
                    }

                    $formField->save();
                }
            }

            $parameter->save();
        }
    }
}
