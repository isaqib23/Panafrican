<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class Branch extends TransformerAbstract
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
     * @param \App\Entities\Branch $model
     * @return array
     */
    public function transform(\App\Entities\Branch $model)
    {
        return [
            'id'                => (int) $model->id,
            "name"              => (string) $model->name,
            "account_id"        => (string) $model->account_id,
            "account_name"      => (string) $model->account->name,
            "location_id"       => (string) $model->location_id,
            "location_name"     => (string) $model->location->name,
            "type"              => (string) $model->type,
            "website"           => (string) $model->website,
            "par"               => (int) $model->par,
            'region_id'         => (int) $model->region_id,
            'region_name'       => (string) $model->region->name,
            'country_id'        => (int) $model->country_id,
            'country_name'      => (string) $model->country->name,
            'area_id'           => (int) $model->area_id,
            'area_name'         => (string) $model->area->name,
        ];
    }
}
