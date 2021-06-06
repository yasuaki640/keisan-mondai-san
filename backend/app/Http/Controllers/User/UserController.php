<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\StoreResource;
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
//        $users = $this->service->
//        return \response()->json()
    }


    public function store(StoreRequest $request): JsonResponse
    {
        $id = $this->service->store($request->all());
        return response()->json(new StoreResource($id), Response::HTTP_CREATED);
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
