<?php

namespace App\Repositories;

use App\Models\Support;

class SupportRepository
{
    private $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(string $lessonId)
    {
        return $this->entity->where('lesson_id', $lessonId)->get();
    }
}
