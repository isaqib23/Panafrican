<?php

namespace App\Http\Controllers;

use App\Transformers\Branch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\BranchRepository;
use App\Validators\BranchValidator;
use Illuminate\Http\Response;

/**
 * Class BranchesController.
 *
 * @package namespace App\Http\Controllers;
 */
class BranchesController extends Controller
{
    /**
     * @var BranchRepository
     */
    protected $repository;

    /**
     * BranchesController constructor.
     *
     * @param BranchRepository $repository

     */
    public function __construct(BranchRepository $repository)
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
        $branches = $this->repository->all()
            ->transformWith(new Branch())->toArray();

        return response()->json($branches);
    }

    /**
     * @param Requests\BranchRequest $request
     * @return JsonResponse
     */
    public function store(Requests\BranchRequest $request)
    {
        $branch = $this->repository->store($request);

        return response()->json((new Branch())->transform($branch));
    }

    /**
     * @param Requests\DeleteAccountRequest $request
     * @return JsonResponse
     */
    public function getByAccount(Requests\DeleteAccountRequest $request)
    {
        $branches = $this->repository->findWhere(['account_id' => $request->input('account_id')])
            ->transformWith(new Branch())->toArray();

        return response()->json($branches);
    }
}
