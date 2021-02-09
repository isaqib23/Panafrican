<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \App\Models\User $model
     *
     * @return array
     */
    public function transform(\App\Models\User $model)
    {
        return [
            'id'                => (int) $model->id,
            'first_name'        => (string) $model->first_name,
            'last_name'         => (string) $model->last_name,
            'full_name'         => (string) $model->getFullName(),
            'email'             => (string) $model->email,
            'user_type'         => (string) $model->user_type,
            'entity'            => (string) $model->entity,
            'device_type'       => (string) $model->device_type,
            'last_login_date'   => (string) $model->last_login_date,
            'region_id'         => (int) $model->region_id,
            'region_name'       => (string) $model->region->name,
            'country_id'        => (int) $model->country_id,
            'country_name'      => (string) $model->country->name,
            'area_id'           => (int) $model->area_id,
            'area_name'         => (string) $model->area->name,
            'permissions'       => $model->getPermissions(),
        ];
    }
}
