<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\IndexResource;
use App\Http\Resources\User\ShowResource;
use App\Http\Resources\User\StoreResource;
use App\Http\Resources\User\UpdateResource;
use App\Models\User;
use App\Service\User\UserService;
use App\Service\User\UserServiceImpl;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private UserService $service;

    /**
     * UserController constructor.
     * @param UserServiceImpl $service
     */
    public function __construct(UserServiceImpl $service)
    {
        $this->service = $service;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->service->index();
        return response()->json(IndexResource::collection($users));
    }

    /**
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(new ShowResource(auth()->user()));
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $id = $this->service->store($request->all());

        return response()->json(new StoreResource($id), Response::HTTP_CREATED);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return response()->json(new IndexResource($user));
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function update(UpdateRequest $request, User $user): JsonResponse
    {
        if ($user->id !== auth()->id()) throw new AuthenticationException("Can't update other than the logged-in user");

        $user = $this->service->update($user->id, $request->all());

        return response()->json(new UpdateResource($user));
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function destroy(User $user): JsonResponse
    {
        if ($user->id !== auth()->id()) throw new AuthenticationException("Can't delete other than the logged-in user");

        $this->service->destroy($user->id);

        return \response()->json([], Response::HTTP_NO_CONTENT);
    }
}
