<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\QuoteRepository;
use App\Entities\Quote;
use App\Validators\QuoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class QuoteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class QuoteRepositoryEloquent extends BaseRepository implements QuoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Quote::class;
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
                'quote_number'      => $request->input('quote_number'),
                'value'             => $request->input('value'),
                'description'       => $request->input('description'),
                'sent_at'           => $request->input('sent_at'),
                'expiry_date'       => $request->input('expiry_date'),
                'type'              => $request->input('type'),
                'status'            => $request->input('status'),
                'opportunity_id'    => $request->input('opportunity_id'),
                'account_id'        => $request->input('account_id'),
                'branch_id'         => $request->input('branch_id'),
                'created_by'        => auth()->id(),
                "country_id"        => ($request->has('country_id')) ? $request->input('country_id') : auth()->user()->country_id,
                "region_id"         => ($request->has('region_id')) ? $request->input('region_id') : auth()->user()->region_id,
                "area_id"           => ($request->has('area_id')) ? $request->input('area_id') : auth()->user()->area_id
            ]
        );
    }
}
