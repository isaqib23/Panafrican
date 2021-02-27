<?php

namespace App\Http\Controllers;

use App\Transformers\SaleTargetTransform;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\SaleTargetRepository;
use Illuminate\Http\Response;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class SaleTargetsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SaleTargetsController extends Controller
{
    /**
     * @var SaleTargetRepository
     */
    protected $repository;

    /**
     * SaleTargetsController constructor.
     *
     * @param SaleTargetRepository $repository
     */
    public function __construct(SaleTargetRepository $repository)
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
        $sales = $this->repository->all()
            ->transformWith(new SaleTargetTransform())->toArray();

        return response()->json($sales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\SaleTargetRequest $request
     *
     * @return Response
     */
    public function store(Requests\SaleTargetRequest $request)
    {
        $sale = $this->repository->store($request);

        return response()->json((new SaleTargetTransform())->transform($sale));
    }

    /**
     * @param Requests\DeleteSaleTargetRequest $request
     * @return JsonResponse
     */
    public function getSaleById(Requests\DeleteSaleTargetRequest $request){
        $sale = $this->repository->findWhere(['id' => $request->input('id')])->first();

        if(!is_null($sale)){
            $sale = (new SaleTargetTransform())->transform($sale);
        }

        return response()->json($sale);
    }

    /**
     * @param Requests\DeleteSaleTargetRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\DeleteSaleTargetRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Sales Target deleted successfully'],200);
    }
}
