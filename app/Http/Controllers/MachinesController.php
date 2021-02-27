<?php

namespace App\Http\Controllers;

use App\Transformers\MachineTransform;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\MachineRepository;
use Illuminate\Http\Response;

/**
 * Class MachinesController.
 *
 * @package namespace App\Http\Controllers;
 */
class MachinesController extends Controller
{
    /**
     * @var MachineRepository
     */
    protected $repository;

    /**
     * MachinesController constructor.
     *
     * @param MachineRepository $repository
     */
    public function __construct(MachineRepository $repository)
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
        $machines = $this->repository->all()
            ->transformWith(new MachineTransform())->toArray();

        return response()->json($machines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\MachineRequest $request
     *
     * @return Response
     */
    public function store(Requests\MachineRequest $request)
    {
        $machine = $this->repository->store($request);

        return response()->json((new MachineTransform())->transform($machine));
    }

    /**
     * @param Requests\DeleteMachineRequest $request
     * @return JsonResponse
     */
    public function getMachineById(Requests\DeleteMachineRequest $request){
        $machine = $this->repository->findWhere(['id' => $request->input('id')])->first();

        if(!is_null($machine)){
            $machine = (new MachineTransform())->transform($machine);
        }

        return response()->json($machine);
    }

    /**
     * @param Requests\DeleteMachineRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\DeleteMachineRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Machine deleted successfully'],200);
    }
}
