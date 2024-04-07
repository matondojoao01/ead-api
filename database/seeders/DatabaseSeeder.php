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
        /*\App\Models\Course::factory()->count(10)->create();

        $courses = \App\Models\Course::all();

        foreach ($courses as $course) {
            $course->modules()->saveMany(\App\Models\Module::factory()->count(5)->make());
        }

        $modules = \App\Models\Module::all();

        foreach ($modules as $module) {
            $module->lessons()->saveMany(\App\Models\Lesson::factory()->count(10)->make());
        }*/

        // $lessons = \App\Models\Lesson::all();

        // foreach ($lessons as $lesson) {
        //     $lesson->supports()->saveMany(\App\Models\Support::factory()->count(5)->make());
        // }

        $supports = \App\Models\Support::all();

        foreach ($supports as $support) {
            $support->replies()->saveMany(\App\Models\ReplySupport::factory()->count(2)->make());
        }

        //\App\Models\Support::factory()->count(10)->create();
    }
}
