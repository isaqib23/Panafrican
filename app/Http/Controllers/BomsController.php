<?php

namespace App\Http\Controllers;

use App\Repositories\BomPartRepositoryEloquent;
use App\Transformers\BomTransform;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\BomRepository;
use Illuminate\Http\Response;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BomsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BomsController extends Controller
{
    /**
     * @var BomRepository
     */
    protected $repository;
    /**
     * @var BomPartRepositoryEloquent
     */
    private $bomPartRepositoryEloquent;

    /**
     * BomsController constructor.
     *
     * @param BomRepository $repository
     * @param BomPartRepositoryEloquent $bomPartRepositoryEloquent
     */
    public function __construct(
        BomRepository $repository,
        BomPartRepositoryEloquent $bomPartRepositoryEloquent
)
    {
        $this->repository = $repository;
        $this->bomPartRepositoryEloquent = $bomPartRepositoryEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $boms = $this->repository->all()
            ->transformWith(new BomTransform())->toArray();

        return response()->json($boms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\BomRequest $request
     *
     * @return Response
     * @throws ValidatorException
     */
    public function store(Requests\BomRequest $request)
    {
        $bom_part = $this->bomPartRepositoryEloquent->store($request);

        $request->merge([
            "part_id" => $bom_part->id
        ]);

        $bom = $this->repository->store($request);

        return response()->json((new BomTransform())->transform($bom));
    }

    /**
     * @param Requests\DeleteBomRequest $request
     * @return JsonResponse
     */
    public function getBomById(Requests\DeleteBomRequest $request){
        $bom = $this->repository->findWhere(['id' => $request->input('id')])->first();
        if(!is_null($bom)){
            $bom = (new BomTransform())->transform($bom);
        }
        return response()->json($bom);
    }

    /**
     * @param Requests\DeleteBomRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\DeleteBomRequest $request){
        $bom = $this->repository->findWhere(['id' => $request->input('id')])->first();

        $this->bomPartRepositoryEloquent->delete($bom->part_id);
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Bom deleted successfully'],200);
    }
}
