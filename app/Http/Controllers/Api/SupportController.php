<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportReplyRequest;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Resources\ReplayResoure;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    private $repository;

    public function __construct(SupportRepository $SupportRepository)
    {
        $this->repository = $SupportRepository;
    }

    public function index(Request $request)
    {
        $supports = $this->repository->getSupports($request->all());
        return SupportResource::collection($supports);
    }
    public function mySupports(Request $request)
    {
        $supports = $this->repository->getMySupports($request->all());
        return SupportResource::collection($supports);
    }

    public function store(StoreSupportRequest $request)
    {
        $support = $this->repository->createNewSupport($request->validated());
        return new SupportResource($support);
    }
}
