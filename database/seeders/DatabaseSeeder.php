<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $courses = \App\Models\Course::factory()->count(10)->create();

        foreach ($courses as $course) {
            $course->modules()->saveMany(\App\Models\Module::factory()->count(5)->make());
        }
    }
}
