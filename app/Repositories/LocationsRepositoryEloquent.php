<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LocationsRepository;
use App\Entities\Locations;
use App\Validators\LocationsValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class LocationsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LocationsRepositoryEloquent extends BaseRepository implements LocationsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Locations::class;
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
                "address"       => $request->input('address'),
                "city"          => $request->input('city'),
                "type"          => $request->input('type'),
                "latitude"      => $request->input('latitude'),
                "longitude"     => $request->input('longitude'),
                "region_id"     => $request->input('region_id'),
                "country_id"    => $request->input('country_id'),
                "area_id"       => $request->input('area_id'),
            ]
        );
    }
}
