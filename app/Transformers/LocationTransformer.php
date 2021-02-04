<?php

namespace App\Transformers;

use App\Entities\Locations;
use League\Fractal\TransformerAbstract;
use App\Entities\Location;

/**
 * Class LocationTransformer.
 *
 * @package namespace App\Transformers;
 */
class LocationTransformer extends TransformerAbstract
{
    /**
     * Transform the Location entity.
     *
     * @param Locations $model
     *
     * @return array
     */
    public function transform(Locations $model)
    {
        return [
            'id'                => (int) $model->id,
            "address"           => (string) $model->address,
            "city"              => (string) $model->city,
            "type"              => (string) $model->type,
            "latitude"          => (string) $model->latitude,
            "longitude"         => (string) $model->longitude,
            'region_id'         => (int) $model->region_id,
            'region_name'       => (string) $model->region->name,
            'country_id'        => (int) $model->country_id,
            'country_name'      => (string) $model->country->name,
            'area_id'           => (int) $model->area_id,
            'area_name'         => (string) $model->area->name,
        ];
    }
}
