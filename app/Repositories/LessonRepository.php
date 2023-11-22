<?php

namespace App\Repositories;

use App\Models\Lesson;
use Illuminate\Support\Facades\Cache;

class LessonRepository
{
    protected $entity;
    protected $time = 5;

    public function __construct(Lesson $model)
    {
        $this->entity = $model;
    }

    public function getLessonsModuleById(string $identify)
    {
        return Cache::remember('getlessonmodulebyid', $this->time, function () use ($identify) {
            return  $this->entity->where('module_id', $identify)->get();
        });
    }

    public function getLessonById($lessonId)
    {
        return Cache::remember('getlessonmodulebyid', $this->time, function () use ($lessonId) {
            return $this->entity->findOrFail($lessonId);
        });
    }
}
