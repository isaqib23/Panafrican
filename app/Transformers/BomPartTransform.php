<?php

namespace App\Transformers;

use App\Entities\BomPart;
use League\Fractal\TransformerAbstract;

class BomPartTransform extends TransformerAbstract
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
     * @param BomPart $bomPart
     * @return array
     */
    public function transform(BomPart $bomPart)
    {
        return [
            "id"                => (int) $bomPart->id,
            'part_number'       => (string) $bomPart->part_number,
            'description'       => (string) $bomPart->description,
            'commodity_code'    => (string) $bomPart->commodity_code
        ];
    }
}
