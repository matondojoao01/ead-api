<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;

class SupportRepository
{
    private $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = [])
    {
        return $this->getUserAuth()->supports()->where(function ($query) use ($filters) {
            if (isset($filters['lesson'])) {
                $query->where('lesson_id', $filters['lesson']);
            }
            if (isset($filters['status'])) {
                $query->where('status', $filters['status']);
            }
            if (isset($filters['filter'])) {
                $filter = $filters['filter'];
                $query->where('description', 'LIKE', "%{$filter}%");
            }
        })->get();
    }

    public function createNewSupport(array $data): Support
    {
        return $this->getUserAuth()->supports()->create(['lesson_id' => $data['lesson'], 'status' => $data['status'], 'description' => $data['description']]);
    }

    public function createReplyToSupportId(array $data, $supportId)
    {
        return $this->getSupport($supportId)->replies()->create([
            'user_id' => $this->getUserAuth()->id, 'description' => $data['description']
        ]);
    }
    private function getSupport(string $id): Support
    {
        return $this->entity->findOrFail($id);
    }

    private function getUserAuth(): User
    {
        //    return auth('api')->user();

        return User::first();
    }
}