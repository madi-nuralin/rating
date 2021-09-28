<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
            $role = \App\Models\Role::create();
            $role->setName($definition[0]);
            $role->save();
        }

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);     

        \App\Models\User::factory(10)->create();

        // Positions
        $definitions = [
            ['Manager', 'Managers are the people in charge of employees and the facilities they work for. '],
            ['Assistant', 'Customize your administrative assistant job description by using this template'],
        ];

        foreach ($definitions as $definition) {
            $position = \App\Models\Position::create();
            $position->setName($definition[0]);
            $position->setDescription($definition[1]);
            $position->save();
        }

        // Departments
        $definitions = [
            ['MCM', 'Mathematical and computer modelling cathedra'],
            ['CS', 'Computer science cathedra'],
        ];

        foreach ($definitions as $definition) {
            $department = \App\Models\Department::create();
            $department->setName($definition[0]);
            $department->setDescription($definition[1]);
            $department->save();
        }
    }
}
