<?php

namespace App\Transformers;

use App\Entities\Opportunity;
use League\Fractal\TransformerAbstract;

class OpportunityTransformer extends TransformerAbstract
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
     * @param Opportunity $opportunity
     * @return array
     */
    public function transform(Opportunity $opportunity)
    {
        return [
            'value'             => (int) $opportunity->value,
            'description'       => (string) $opportunity->description,
            'pipeline'          => (string) $opportunity->pipeline,
            'pipeline_stage'    => (string) $opportunity->pipeline_stage,
            'sales_type'        => (string) $opportunity->sales_type,
            'target_date'       => (string) $opportunity->target_date,
            'primary_contact'   => (string) $opportunity->primary_contact,
            'source'            => (string) $opportunity->source,
            'probability'       => (int) $opportunity->probability,
            'status'            => (string) $opportunity->status,
            'closing_date'      => (string) $opportunity->closing_date,
            'owner_id'          => (int) $opportunity->owner_id,
            'owner_name'        => (string) $opportunity->owner->getFullName(),
            'account_id'        => (int) $opportunity->account,
            'account_name'      => (string) $opportunity->account->name,
            'branch_id'         => (int) $opportunity->branch_id,
            'branch_name'       => (string) $opportunity->branch->name,
            'created_by'        => (int) $opportunity->created_by,
            'author_name'       => (string) $opportunity->author->getFullName(),
            'region_id'         => (int) $opportunity->region_id,
            'region_name'       => (string) $opportunity->region->name,
            'country_id'        => (int) $opportunity->country_id,
            'country_name'      => (string) $opportunity->country->name,
            'area_id'           => (int) $opportunity->area_id,
            'area_name'         => (string) $opportunity->area->name,
        ];
    }
}
