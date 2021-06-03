<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Service\UserSerivce;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;

    public function __construct(UserSerivce $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        //
    }


    public function create(CreateRequest $request)
    {

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
