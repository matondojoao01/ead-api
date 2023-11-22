<?php

namespace App\Repositories;

use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;
use Illuminate\Support\Facades\Cache;

class SupportRepository
{
    use RepositoryTrait;

    private $entity;
    private $time = 5;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }
    public function getMySupports(array $filters = [])
    {
        $filters['user'] = true;
        return $this->getSupports($filters);
    }

    public function getSupports(array $filters = [])
    {

        return Cache::remember('getallcourses', $this->time, function () use ($filters) {
            return $this->entity->where(function ($query) use ($filters) {
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
                if (isset($filters['user'])) {
                    $user =  $this->getUserAuth();
                    $query->where('user_id', $user->id);
                }
            })->orderBy('updated_at')->get();
        });
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
    public function getSupport(string $id): Support
    {
        return $this->entity->findOrFail($id);
    }
}
