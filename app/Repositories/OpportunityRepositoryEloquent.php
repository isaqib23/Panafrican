<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OpportunityRepository;
use App\Entities\Opportunity;
use App\Validators\OpportunityValidator;

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
    
}
