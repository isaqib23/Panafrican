<?php

namespace App\Transformers;

use App\Entities\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransform extends TransformerAbstract
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
     * @param Contact $contact
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'id'                => (int) $contact->id,
            'first_name'        => (string) $contact->first_name,
            'last_name'         => (string) $contact->last_name,
            'position'          => (string) $contact->position,
            'role_description'  => (string) $contact->role_description,
            'email'             => (string) $contact->email,
            'phone'             => (string) $contact->phone,
            'account_id'        => (int) $contact->account_id,
            'account_name'      => (string) $contact->account->name,
            'branch_id'         => (int) $contact->branch_id,
            'branch_name'       => (string) $contact->branch->name,
            'created_by'        => (int) $contact->created_by,
            'author_name'       => (string) $contact->author->getFullName(),
            'region_id'         => (int) $contact->region_id,
            'region_name'       => (string) $contact->region->name,
            'country_id'        => (int) $contact->country_id,
            'country_name'      => (string) $contact->country->name,
            'area_id'           => (int) $contact->area_id,
            'area_name'         => (string) $contact->area->name
        ];
    }
}
