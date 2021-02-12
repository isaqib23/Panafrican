<?php

namespace App\Http\Controllers;

use App\Transformers\OpportunityTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\OpportunityRepository;
use Illuminate\Http\Response;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class OpportunitiesController.
 *
 * @package namespace App\Http\Controllers;
 */
class OpportunitiesController extends Controller
{
    /**
     * @var OpportunityRepository
     */
    protected $repository;

    /**
     * OpportunitiesController constructor.
     *
     * @param OpportunityRepository $repository
     */
    public function __construct(OpportunityRepository $repository)
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
        $opportunities = $this->repository->all()
            ->transformWith(new OpportunityTransformer())->toArray();

        return response()->json($opportunities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\OpportunityRequest $request
     *
     * @return Response
     *
     */
    public function store(Requests\OpportunityRequest $request)
    {
        $opportunity = $this->repository->store($request);

        return response()->json((new OpportunityTransformer())->transform($opportunity));
    }

    /**
     * @param Requests\DeleteOpportunityRequest $request
     * @return JsonResponse
     */
    public function getOpportunityById(Requests\DeleteOpportunityRequest $request){
        $opportunity = $this->repository->findWhere(['id' => $request->input('id')])->first();

        return response()->json((new OpportunityTransformer())->transform($opportunity));
    }

    /**
     * @param Requests\DeleteOpportunityRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\DeleteOpportunityRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Opportunity deleted successfully'],200);
    }
}
