<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Resources\User\CreateResource;
use App\Service\User\UserService;
use App\Service\User\UserServiceImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private UserService $service;

    public function __construct(UserServiceImpl $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        //
    }


    public function create(CreateRequest $request): JsonResponse
    {
        $id = $this->service->create($request->all());
        return response()->json(new CreateResource($id), Response::HTTP_CREATED);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
