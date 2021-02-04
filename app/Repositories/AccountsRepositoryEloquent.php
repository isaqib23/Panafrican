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
                "region_id"     => $request->input('region_id'),
                "country_id"    => $request->input('country_id'),
                "area_id"       => $request->input('area_id'),
            ]
        );
    }
}
