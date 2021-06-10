<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\StoreResource;
use App\Http\Resources\User\UpdateResource;
use App\Http\Resources\User\IndexResource;
use App\Models\User;
use App\Service\User\UserService;
use App\Service\User\UserServiceImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private UserService $service;

    public function __construct(UserServiceImpl $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $users = $this->service->index();
        return response()->json(IndexResource::collection($users));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $id = $this->service->store($request->all());
        return response()->json(new StoreResource($id), Response::HTTP_CREATED);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json(new IndexResource($user));
    }

    public function update(EditRequest $request, int $id): JsonResponse
    {
        $this->authorize('update',$id);
        $user = $this->service->update($id, $request->all());
        return response()->json(new UpdateResource($user));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);
        return \response()->json([], Response::HTTP_NO_CONTENT);
    }
}
