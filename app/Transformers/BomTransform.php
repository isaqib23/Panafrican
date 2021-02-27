<?php

namespace App\Transformers;

use App\Entities\Bom;
use League\Fractal\TransformerAbstract;

class BomTransform extends TransformerAbstract
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
     * @return array
     */
    public function transform(Bom $bom)
    {
        return [
            "id"                => (int) $bom->id,
            'name'              => (string) $bom->name,
            'description'       => (string) $bom->description,
            'quantity'          => (string) $bom->quantity,
            'machine_model'     => (string) $bom->machine_model,
            'bom_part'          => (object) (new BomPartTransform())->transform($bom->part),
        ];
    }
}
