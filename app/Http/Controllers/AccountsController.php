<?php

namespace App\Http\Controllers;

use App\Transformers\Accounts;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\AccountsRepository;
use Illuminate\Http\Response;

/**
 * Class AccountsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AccountsController extends Controller
{
    /**
     * @var AccountsRepository
     */
    protected $repository;

    /**
     * AccountsController constructor.
     *
     * @param AccountsRepository $repository
     */
    public function __construct(
        AccountsRepository $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accounts = $this->repository->all()
            ->transformWith(new Accounts())->toArray();

        return response()->json($accounts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\AccountRequest $request
     *
     * @return Response
     *
     */
    public function store(Requests\AccountRequest $request)
    {
        $account = $this->repository->store($request);

        return response()->json((new Accounts())->transform($account));
    }
}
