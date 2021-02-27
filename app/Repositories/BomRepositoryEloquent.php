<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BomRepository;
use App\Entities\Bom;
use App\Validators\BomValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BomRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BomRepositoryEloquent extends BaseRepository implements BomRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bom::class;
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
                'name'              => $request->input('name'),
                'description'       => $request->input('description'),
                'part_id'           => $request->input('part_id'),
                'quantity'          => $request->input('quantity'),
                'machine_model'     => $request->input('machine_model')
            ]
        );
    }
}
