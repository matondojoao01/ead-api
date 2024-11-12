<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ReplayResoure;
use App\Http\Requests\StoreSupportReplyRequest;
use App\Repositories\ReplySupportRepository;

class ReplySupportController extends Controller
{
    private $repository;

    public function __construct(ReplySupportRepository $ReplySupportRepository)
    {
        $this->repository = $ReplySupportRepository;
    }
    public function createReply(StoreSupportReplyRequest $request)
    {
        $reply = $this->repository->createReplyToSupportId($request->validated());

        return new ReplayResoure($reply);
    }
}
