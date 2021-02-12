<?php

namespace App\Http\Controllers;

use App\Transformers\LeadsTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\LeadsRepository;
use Illuminate\Http\Response;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class LeadsController.
 *
 * @package namespace App\Http\Controllers;
 */
class LeadsController extends Controller
{
    /**
     * @var LeadsRepository
     */
    protected $repository;

    /**
     * LeadsController constructor.
     *
     * @param LeadsRepository $repository
     */
    public function __construct(LeadsRepository $repository)
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
        $leads = $this->repository->all()
            ->transformWith(new LeadsTransformer())->toArray();

        return response()->json($leads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\LeadsRequest $request
     *
     * @return Response
     *
     */
    public function store(Requests\LeadsRequest $request)
    {
        $branch = $this->repository->store($request);

        return response()->json((new LeadsTransformer())->transform($branch));
    }

    /**
     * @param Requests\DeleteLeadRequest $request
     * @return JsonResponse
     */
    public function getLeadById(Requests\DeleteLeadRequest $request){
        $branch = $this->repository->findWhere(['id' => $request->input('id')])->first();

        return response()->json((new LeadsTransformer())->transform($branch));
    }

    /**
     * @param Requests\DeleteLeadRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\DeleteLeadRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Lead deleted successfully'],200);
    }
}
