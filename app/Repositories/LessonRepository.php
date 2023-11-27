<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Repositories\Traits\RepositoryTrait;
use Illuminate\Support\Facades\Cache;

class LessonRepository
{
    use RepositoryTrait;

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
    public function maskLessonViewed(string $lessonId)
    {
        $user = $this->getUserAuth();

        $viewed = $user->views()->firstOrNew(['lesson_id' => $lessonId]);

        $viewed->qty = $viewed->qty + 1;

        $viewed->save();

        return $viewed;
    }
}
