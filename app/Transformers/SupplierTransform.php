<?php

namespace App\Transformers;

use App\Entities\Supplier;
use League\Fractal\TransformerAbstract;

class SupplierTransform extends TransformerAbstract
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
     * @param Supplier $supplier
     * @return array
     */
    public function transform(Supplier $supplier)
    {
        return [
            'name'              => (string) $supplier->type,
            'type'              => (string) $supplier->name,
            'location'          => (object) (new LocationTransformer())->transform($supplier->location),
            'region_id'         => (int) $supplier->region_id,
            'region_name'       => (string) $supplier->region->name,
            'country_id'        => (int) $supplier->country_id,
            'country_name'      => (string) $supplier->country->name,
            'area_id'           => (int) $supplier->area_id,
            'area_name'         => (string) $supplier->area->name
        ];
    }
}
