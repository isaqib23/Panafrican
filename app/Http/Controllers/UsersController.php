<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\UsersRepository;
use Illuminate\Http\Response;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    /**
     * @var UsersRepository
     */
    protected $repository;

    /**
     * UsersController constructor.
     *
     * @param UsersRepository $repository
     */
    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $column = key($request->all());
        $value = $request->input($column);

        $users = $this->repository->findWhere([$column => $value])
            ->transformWith(new UserTransformer())->toArray();

        return response()->json($users);
    }
}
