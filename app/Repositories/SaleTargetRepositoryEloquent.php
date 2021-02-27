<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SaleTargetRepository;
use App\Entities\SaleTarget;
use App\Validators\SaleTargetValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class SaleTargetRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SaleTargetRepositoryEloquent extends BaseRepository implements SaleTargetRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SaleTarget::class;
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
                'sale_type'         => $request->input('sale_type'),
                'budget'            => $request->input('budget'),
                'actual'            => $request->input('actual'),
                'month'             => $request->input('month'),
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
