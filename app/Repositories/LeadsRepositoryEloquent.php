<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LeadsRepository;
use App\Entities\Leads;
use App\Validators\LeadsValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class LeadsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LeadsRepositoryEloquent extends BaseRepository implements LeadsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Leads::class;
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
                'value'             => $request->input('value'),
                'description'       => $request->input('description'),
                'pipeline'          => $request->input('pipeline'),
                'pipeline_stage'    => $request->input('pipeline_stage'),
                'sales_type'        => $request->input('sales_type'),
                'target_date'       => $request->input('target_date'),
                'primary_contact'   => $request->input('primary_contact'),
                'owner_id'          => $request->input('owner_id'),
                'source'            => $request->input('source'),
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
