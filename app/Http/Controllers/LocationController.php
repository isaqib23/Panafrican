<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Transformers\LocationTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\LocationsRepository;
use League\Fractal\Resource\Collection;

class LocationController extends Controller
{
    /**
     * @var LocationsRepository
     */
    private $repository;
    /**
     * @var Collection
     */
    private $collection;

    /**
     * LocationController constructor.
     * @param LocationsRepository $repository
     * @param Collection $collection
     */
    public function __construct(
        LocationsRepository $repository,
        Collection $collection
    )
    {
        $this->repository = $repository;
        $this->collection = $collection;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request){
        $locations = $this->repository->all()
            ->transformWith(new LocationTransformer())->toArray();

        return response()->json($locations);
    }

    public function store(LocationRequest $request)
    {
        $response = $this->repository->store($request);

        return response()->json((new LocationTransformer())->transform($response));
    }
}
