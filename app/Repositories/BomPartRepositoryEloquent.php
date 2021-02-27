<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BomPartRepository;
use App\Entities\BomPart;
use App\Validators\BomPartValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BomPartRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BomPartRepositoryEloquent extends BaseRepository implements BomPartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BomPart::class;
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
                'part_number'       => $request->input('part_number'),
                'description'       => $request->input('description'),
                'commodity_code'    => $request->input('commodity_code')
            ]
        );
    }
}
