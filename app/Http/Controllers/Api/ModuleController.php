<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    private $repository;

    public function __construct(ModuleRepository $ModuleRepository)
    {
        $this->repository = $ModuleRepository;
    }

    public function index($courseId)
    {
        $modules = $this->repository->getModulesCourseById($courseId);
        return ModuleResource::collection($modules);
    }
}
