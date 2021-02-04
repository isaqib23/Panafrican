<?php

namespace App\Entities;

use App\Models\Area;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Branch.
 *
 * @package namespace App\Entities;
 */
class Branch extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "account_id",
        "type",
        "location_id",
        "website",
        "par",
        "region_id",
        "country_id",
        "area_id"
    ];

    /**
     * @var string
     */
    protected $table = 'branches';

    /**
     * @return BelongsTo
     */
    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }

    /**
     * @return BelongsTo
     */
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    /**
     * @return BelongsTo
     */
    public function area(){
        return $this->belongsTo(Area::class,'area_id');
    }

    /**
     * @return BelongsTo
     */
    public function account(){
        return $this->belongsTo(Accounts::class,'account_id');
    }

    /**
     * @return BelongsTo
     */
    public function location(){
        return $this->belongsTo(Locations::class,'location_id');
    }
}
