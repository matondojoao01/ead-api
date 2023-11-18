<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    protected $entity;

    public function __construct(Lesson $model)
    {
        $this->entity = $model;
    }

    public function getLessonsModuleById(string $identify)
    {
        return  $this->entity->where('module_id', $identify)->get();
    }

    public function getLessonBySlug(string $slug)
    {
        return  $this->entity->where('slug',$slug)->first();
    }
}
