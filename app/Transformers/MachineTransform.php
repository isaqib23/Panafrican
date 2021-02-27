<?php

namespace App\Transformers;

use App\Entities\Machine;
use League\Fractal\TransformerAbstract;

class MachineTransform extends TransformerAbstract
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
     * @param Machine $machine
     * @return array
     */
    public function transform(Machine $machine)
    {
        return [
            'id'                => (int) $machine->id,
            'oem'               => (string) $machine->oem,
            'model'             => (string) $machine->model,
            'serial'            => (string) $machine->serial,
            'unit_no'           => (string) $machine->unit_no,
            'type'              => (string) $machine->type,
            'application'       => (string) $machine->application,
            'location'          => (object) (new LocationTransformer())->transform($machine->location),
            'created_by'        => (int) $machine->created_by,
            'author_name'       => (string) $machine->author->getFullName(),
            'account_id'        => (int) $machine->account_id,
            'account_name'      => (string) $machine->account->name,
            'branch_id'         => (int) $machine->branch_id,
            'branch_name'       => (string) $machine->branch->name,
            'region_id'         => (int) $machine->region_id,
            'region_name'       => (string) $machine->region->name,
            'country_id'        => (int) $machine->country_id,
            'country_name'      => (string) $machine->country->name,
            'area_id'           => (int) $machine->area_id,
            'area_name'         => (string) $machine->area->name
        ];
    }
}
