<?php

namespace App\Transformers;

use App\Entities\Activity;
use League\Fractal\TransformerAbstract;

class ActivityTransformer extends TransformerAbstract
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
     * @param Activity $activity
     * @return array
     */
    public function transform(Activity $activity)
    {
        return [
            'id'                => (int) $activity->id,
            'title'             => (string) $activity->title,
            'description'       => (string) $activity->description,
            'type'              => (string) $activity->type,
            'topic'             => (string) $activity->topic,
            'target_date'       => (string) $activity->target_date,
            'closing_date'      => (string) $activity->closing_date,
            'status'            => (string) $activity->status,
            'completed'         => (int) $activity->completed,
            'account_id'        => (int) $activity->account_id,
            'account_name'      => (string) $activity->account->name,
            'branch_id'         => (int) $activity->branch_id,
            'branch_name'       => (string) $activity->branch->name,
            'created_by'        => (int) $activity->created_by,
            'author_name'       => (string) $activity->author->getFullName(),
            'region_id'         => (int) $activity->region_id,
            'region_name'       => (string) $activity->region->name,
            'country_id'        => (int) $activity->country_id,
            'country_name'      => (string) $activity->country->name,
            'area_id'           => (int) $activity->area_id,
            'area_name'         => (string) $activity->area->name,
        ];
    }
}
