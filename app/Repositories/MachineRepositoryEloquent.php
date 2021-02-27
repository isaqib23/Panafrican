<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MachineRepository;
use App\Entities\Machine;
use App\Validators\MachineValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class MachineRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MachineRepositoryEloquent extends BaseRepository implements MachineRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Machine::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param $request
     * @return mixed
     * @throws ValidatorException
     */
    public function store($request){
        return $this->updateOrCreate(
            ["id" => $request->input('id')],
            [
                'oem'               => $request->input('oem'),
                'model'             => $request->input('model'),
                'serial'            => $request->input('serial'),
                'unit_no'           => $request->input('unit_no'),
                'type'              => $request->input('type'),
                'application'       => $request->input('application'),
                'location_id'       => $request->input('location_id'),
                'account_id'        => $request->input('account_id'),
                'branch_id'         => $request->input('branch_id'),
                "created_by"        => auth()->id(),
                "country_id"        => ($request->has('country_id')) ? $request->input('country_id') : auth()->user()->country_id,
                "region_id"         => ($request->has('region_id')) ? $request->input('region_id') : auth()->user()->region_id,
                "area_id"           => ($request->has('area_id')) ? $request->input('area_id') : auth()->user()->area_id
            ]
        );
    }
}
