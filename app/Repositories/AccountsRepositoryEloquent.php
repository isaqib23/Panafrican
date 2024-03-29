<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AccountsRepository;
use App\Entities\Accounts;
use App\Validators\AccountsValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class AccountsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AccountsRepositoryEloquent extends BaseRepository implements AccountsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Accounts::class;
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
                "rank"          => $request->input('rank'),
                "country_id"    => ($request->has('country_id')) ? $request->input('country_id') : auth()->user()->country_id,
                "region_id"     => ($request->has('region_id')) ? $request->input('region_id') : auth()->user()->region_id,
                "area_id"       => ($request->has('area_id')) ? $request->input('area_id') : auth()->user()->area_id
            ]
        );
    }
}
