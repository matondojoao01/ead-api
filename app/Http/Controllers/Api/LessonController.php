<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViewRequest;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $repository;

    public function __construct(LessonRepository $LessonRepository)
    {
        $this->repository = $LessonRepository;
    }

    public function index($moduleId)
    {
        return LessonResource::collection($this->repository->getLessonsModuleById($moduleId));
    }

    public function show($lessonId)
    {
        return new LessonResource($this->repository->getLessonById($lessonId));
    }

    public function viewed(StoreViewRequest $request)
    {
        $this->repository->maskLessonViewed($request->lesson);

       return response()->json(['success' => true]);
    }
}
