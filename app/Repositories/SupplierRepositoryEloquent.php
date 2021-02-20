<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SupplierRepository;
use App\Entities\Supplier;
use App\Validators\SupplierValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class SupplierRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SupplierRepositoryEloquent extends BaseRepository implements SupplierRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Supplier::class;
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
                'name'          => $request->input('name'),
                'type'          => $request->input('type'),
                'location_id'   => $request->input('location_id'),
                'created_by'    => auth()->id(),
                "country_id"    => ($request->has('country_id')) ? $request->input('country_id') : auth()->user()->country_id,
                "region_id"     => ($request->has('region_id')) ? $request->input('region_id') : auth()->user()->region_id,
                "area_id"       => ($request->has('area_id')) ? $request->input('area_id') : auth()->user()->area_id
            ]
        );
    }
}
