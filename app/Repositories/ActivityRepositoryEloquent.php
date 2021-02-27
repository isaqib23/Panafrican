<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ActivityRepository;
use App\Entities\Activity;
use App\Validators\ActivityValidator;

/**
 * Class ActivityRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ActivityRepositoryEloquent extends BaseRepository implements ActivityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Activity::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function store($request) {
        return $this->updateOrCreate(
            ["id" => $request->input('id')],
            [
                'title'             => $request->input('title'),
                'description'       => $request->input('description'),
                'type'              => $request->input('type'),
                'topic'             => $request->input('topic'),
                'target_date'       => $request->input('target_date'),
                'closing_date'      => $request->input('closing_date'),
                'status'            => $request->input('status'),
                'completed'         => $request->input('completed'),
                'account_id'        => $request->input('account_id'),
                'branch_id'         => $request->input('branch_id'),
                'status'            => 'in-progress',
                "created_by"        => auth()->id(),
                "country_id"    => ($request->has('country_id')) ? $request->input('country_id') : auth()->user()->country_id,
                "region_id"     => ($request->has('region_id')) ? $request->input('region_id') : auth()->user()->region_id,
                "area_id"       => ($request->has('area_id')) ? $request->input('area_id') : auth()->user()->area_id
            ]
        );
    }
}
