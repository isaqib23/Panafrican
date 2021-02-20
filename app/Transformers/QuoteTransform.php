<?php

namespace App\Transformers;

use App\Entities\Quote;
use League\Fractal\TransformerAbstract;

class QuoteTransform extends TransformerAbstract
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
     * @param Quote $quote
     * @return array
     */
    public function transform(Quote $quote)
    {
        return [
            'quote_number'      => (string) $quote->quote_number,
            'value'             => (int) $quote->value,
            'description'       => (string) $quote->description,
            'sent_at'           => (string) $quote->sent_at,
            'expiry_date'       => (string) $quote->expiry_date,
            'type'              => (string) $quote->type,
            'status'            => (string) $quote->status,
            'opportunity'       => (object) (new OpportunityTransformer())->transform($quote->opportunity),
            'account_id'        => (int) $quote->account_id,
            'account_name'      => (string) $quote->account->name,
            'branch_id'         => (int) $quote->branch_id,
            'branch_name'       => (string) $quote->branch->name,
            'created_by'        => (int) $quote->created_by,
            'author_name'       => (string) $quote->author->getFullName(),
            'region_id'         => (int) $quote->region_id,
            'region_name'       => (string) $quote->region->name,
            'country_id'        => (int) $quote->country_id,
            'country_name'      => (string) $quote->country->name,
            'area_id'           => (int) $quote->area_id,
            'area_name'         => (string) $quote->area->name
        ];
    }
}
