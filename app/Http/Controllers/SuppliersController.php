<?php

namespace App\Http\Controllers;

use App\Transformers\SupplierTransform;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\SupplierRepository;
use Illuminate\Http\Response;

/**
 * Class SuppliersController.
 *
 * @package namespace App\Http\Controllers;
 */
class SuppliersController extends Controller
{
    /**
     * @var SupplierRepository
     */
    protected $repository;

    /**
     * SuppliersController constructor.
     *
     * @param SupplierRepository $repository
     */
    public function __construct(SupplierRepository $repository)
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
        $suppliers = $this->repository->all()
            ->transformWith(new SupplierTransform())->toArray();

        return response()->json($suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\SupplierRequest $request
     *
     * @return Response
     */
    public function store(Requests\SupplierRequest $request)
    {
        $supplier = $this->repository->store($request);

        return response()->json((new SupplierTransform())->transform($supplier));
    }

    /**
     * @param Requests\deleteSupplierRequest $request
     * @return JsonResponse
     */
    public function getSupplierById(Requests\deleteSupplierRequest $request){
        $supplier = $this->repository->findWhere(['id' => $request->input('id')])->first();

        if(!is_null($supplier)){
            $supplier =  (new SupplierTransform())->transform($supplier);
        }

        return response()->json($supplier);
    }

    /**
     * @param Requests\deleteSupplierRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\deleteSupplierRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Supplier deleted successfully'],200);
    }
}
