<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Repositories\Traits\RepositoryTrait;

class ReplySupportRepository
{
    use RepositoryTrait;

    private $entity;

    public function __construct(ReplySupport $model)
    {
        $this->entity = $model;
    }

    public function createReplyToSupportId(array $data)
    {
        $user = $this->getUserAuth();
        return   $this->entity->create([
            'user_id' => $user->id, 'support_id' => $data['support'], 'description' => $data['description']
        ]);
    }
}
