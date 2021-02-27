<?php

namespace App\Transformers;

use App\Entities\Document;
use League\Fractal\TransformerAbstract;

class DocumentTransform extends TransformerAbstract
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
     * @param Document $document
     * @return array
     */
    public function transform(Document $document)
    {
        return [
            'id'                => (int) $document->id,
            'description'       => (string) $document->description,
            'type'              => (string) $document->type,
            'link'              => (string) $document->link,
            'account_id'        => (int) $document->account_id,
            'account_name'      => (string) $document->account->name,
            'branch_id'         => (int) $document->branch_id,
            'branch_name'       => (string) $document->branch->name,
            'region_id'         => (int) $document->region_id,
            'region_name'       => (string) $document->region->name,
            'country_id'        => (int) $document->country_id,
            'country_name'      => (string) $document->country->name,
            'area_id'           => (int) $document->area_id,
            'area_name'         => (string) $document->area->name
        ];
    }
}
