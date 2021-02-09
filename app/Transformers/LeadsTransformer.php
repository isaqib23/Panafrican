<?php

namespace App\Transformers;

use App\Entities\Leads;
use League\Fractal\TransformerAbstract;

class LeadsTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param Leads $leads
     * @return array
     */
    public function transform(Leads $leads)
    {
        return [
            'id'                => (int) $leads->id,
            'value'             => (string) $leads->value,
            'description'       => (string) $leads->description,
            'pipeline'          => (string) $leads->pipeline,
            'pipeline_stage'    => (string) $leads->pipeline_stage,
            'sales_type'        => (string) $leads->sales_type,
            'target_date'       => (string) $leads->target_date,
            'primary_contact'   => (string) $leads->primary_contact,
            'owner_id'          => (int) $leads->owner_id,
            'owner_name'        => (string) $leads->owner->getFullName(),
            'source'            => (string) $leads->source,
            'account_id'        => (int) $leads->account_id,
            'account_name'      => (string) $leads->account->name,
            'branch_id'         => (int) $leads->branch_id,
            'branch_name'       => (string) $leads->branch->name,
            'created_by'        => (int) $leads->created_by,
            'author_name'       => (string) $leads->author->getFullName(),
            'region_id'         => (int) $leads->region_id,
            'region_name'       => (string) $leads->region->name,
            'country_id'        => (int) $leads->country_id,
            'country_name'      => (string) $leads->country->name,
            'area_id'           => (int) $leads->area_id,
            'area_name'         => (string) $leads->area->name,
        ];
    }
}
