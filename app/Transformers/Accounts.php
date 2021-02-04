<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class Accounts extends TransformerAbstract
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
     * @param \App\Entities\Accounts $model
     * @return array
     */
    public function transform(\App\Entities\Accounts $model)
    {
        return [
            'id'                => (int) $model->id,
            "name"              => (string) $model->name,
            "rank"              => (string) $model->rank,
            'region_id'         => (int) $model->region_id,
            'region_name'       => (string) $model->region->name,
            'country_id'        => (int) $model->country_id,
            'country_name'      => (string) $model->country->name,
            'area_id'           => (int) $model->area_id,
            'area_name'         => (string) $model->area->name,
        ];
    }
}
