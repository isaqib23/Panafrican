<?php

namespace App\Transformers;

use App\Entities\SaleTarget;
use League\Fractal\TransformerAbstract;

class SaleTargetTransform extends TransformerAbstract
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
     * @param SaleTarget $saleTarget
     * @return array
     */
    public function transform(SaleTarget $saleTarget)
    {
        return [
            'id'                => (int) $saleTarget->id,
            'budget'            => (string) $saleTarget->budget,
            'actual'            => (string) $saleTarget->actual,
            'month'             => (string) $saleTarget->month,
            'created_by'        => (int) $saleTarget->created_by,
            'author_name'       => (string) $saleTarget->author->getFullName(),
            'account_id'        => (int) $saleTarget->account_id,
            'account_name'      => (string) $saleTarget->account->name,
            'branch_id'         => (int) $saleTarget->branch_id,
            'branch_name'       => (string) $saleTarget->branch->name,
            'region_id'         => (int) $saleTarget->region_id,
            'region_name'       => (string) $saleTarget->region->name,
            'country_id'        => (int) $saleTarget->country_id,
            'country_name'      => (string) $saleTarget->country->name,
            'area_id'           => (int) $saleTarget->area_id,
            'area_name'         => (string) $saleTarget->area->name
        ];
    }
}
