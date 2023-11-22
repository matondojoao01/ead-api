<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;

class CourseRepository
{
    protected $entity;
    protected $time = 5;

    public function __construct(Course $model)
    {
        $this->entity = $model;
    }

    public function getAllCourses()
    {
        return Cache::remember('getallcourses', $this->time, function () {
            return $this->entity->get();
        });
    }

    public function getCourse(string $identify)
    {
        return Cache::remember('getcourses', $this->time, function () use ($identify) {
            return  $this->entity->findOrFail($identify);
        });
    }
}
