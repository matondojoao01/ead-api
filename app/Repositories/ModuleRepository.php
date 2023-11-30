<?php

namespace App\Repositories;

use App\Models\Module;
use Illuminate\Support\Facades\Cache;

class ModuleRepository
{
    private $entity;
    private $time = 5;

    public function __construct(Module $model)
    {
        $this->entity = $model;
    }

    public function getModulesCourseById(string $courseId)
    {
        return Cache::remember('getlessonmodulebyid', $this->time, function () use ($courseId) {
            return $this->entity->with('lessons.views')->where('course_id', $courseId)->get();
        });
    }
}
