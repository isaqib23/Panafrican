<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NoteRepository;
use App\Entities\Note;
use App\Validators\NoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class NoteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NoteRepositoryEloquent extends BaseRepository implements NoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Note::class;
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
                "description"       => $request->input('description'),
                "type"              => $request->input('type'),
                "type_id"           => $request->input('type_id'),
                "branch_id"         => $request->input('branch_id'),
                "created_by"        => auth()->id(),
                "country_id"        => auth()->user()->country_id,
                "region_id"         => auth()->user()->region_id,
                "area_id"           => auth()->user()->area_id
            ]
        );
    }
}
