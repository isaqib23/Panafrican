<?php

namespace App\Http\Controllers;

use App\Transformers\ActivityTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Response;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class ActivitiesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ActivitiesController extends Controller
{
    /**
     * @var ActivityRepository
     */
    protected $repository;

    /**
     * ActivitiesController constructor.
     *
     * @param ActivityRepository $repository
     */
    public function __construct(ActivityRepository $repository)
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
        $activities = $this->repository->all()
            ->transformWith(new ActivityTransformer())->toArray();

        return response()->json($activities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\ActivityRequest $request
     *
     * @return Response
     */
    public function store(Requests\ActivityRequest $request)
    {
        $activity = $this->repository->store($request);

        return response()->json((new ActivityTransformer())->transform($activity));
    }

    /**
     * @param Requests\DeleteActivityRequest $request
     * @return JsonResponse
     */
    public function getActivityById(Requests\DeleteActivityRequest $request){
        $opportunity = $this->repository->findWhere(['id' => $request->input('id')])->first();

        if(!is_null($opportunity)){
            $opportunity = (new ActivityTransformer())->transform($opportunity);
        }

        return response()->json($opportunity);
    }

    /**
     * @param Requests\DeleteActivityRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\DeleteActivityRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Activity deleted successfully'],200);
    }
}
