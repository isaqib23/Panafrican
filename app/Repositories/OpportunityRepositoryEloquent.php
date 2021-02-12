<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OpportunityRepository;
use App\Entities\Opportunity;
use App\Validators\OpportunityValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class OpportunityRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OpportunityRepositoryEloquent extends BaseRepository implements OpportunityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Opportunity::class;
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
                'probability'       => $request->input('probability'),
                'closing_date'      => $request->input('closing_date'),
                'account_id'        => $request->input('account_id'),
                'branch_id'         => $request->input('branch_id'),
                "created_by"        => auth()->id(),
                "country_id"        => auth()->user()->country_id,
                "region_id"         => auth()->user()->region_id,
                "area_id"           => auth()->user()->area_id
            ]
        );

    }
}
