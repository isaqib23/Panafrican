<?php

namespace App\Transformers;

use App\Entities\Note;
use League\Fractal\TransformerAbstract;

class NotesTransformer extends TransformerAbstract
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
     * @param Note $note
     * @return array
     */
    public function transform(Note $note)
    {
        return [
            "description"       => (string) $note->description,
            "type"              => (string) $note->type,
            "type_id"           => (string) $note->type_id,
            'branch_id'         => (int) $note->branch_id,
            'branch_name'       => (string) $note->branch->name,
            'created_by'        => (int) $note->created_by,
            'author_name'       => (string) $note->author->getFullName(),
            'region_id'         => (int) $note->region_id,
            'region_name'       => (string) $note->region->name,
            'country_id'        => (int) $note->country_id,
            'country_name'      => (string) $note->country->name,
            'area_id'           => (int) $note->area_id,
            'area_name'         => (string) $note->area->name,
        ];
    }
}
