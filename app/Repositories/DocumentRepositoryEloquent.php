<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DocumentRepository;
use App\Entities\Document;
use App\Validators\DocumentValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class DocumentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
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
                'description'       => $request->input('description'),
                'type'              => $request->input('type'),
                'link'              => $request->input('link'),
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
