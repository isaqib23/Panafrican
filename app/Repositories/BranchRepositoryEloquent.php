<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BranchRepository;
use App\Entities\Branch;
use App\Validators\BranchValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BranchRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BranchRepositoryEloquent extends BaseRepository implements BranchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Branch::class;
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
                "name"          => $request->input('name'),
                "account_id"    => $request->input('account_id'),
                "type"          => $request->input('type'),
                "location_id"   => $request->input('location_id'),
                "website"       => $request->input('website'),
                "par"           => $request->input('par'),
                "country_id"    => ($request->has('country_id')) ? $request->input('country_id') : auth()->user()->country_id,
                "region_id"     => ($request->has('region_id')) ? $request->input('region_id') : auth()->user()->region_id,
                "area_id"       => ($request->has('area_id')) ? $request->input('area_id') : auth()->user()->area_id
            ]
        );
    }
}
