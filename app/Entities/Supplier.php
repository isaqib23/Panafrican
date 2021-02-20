<?php

namespace App\Entities;

use App\Models\Area;
use App\Models\Country;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Supplier.
 *
 * @package namespace App\Entities;
 */
class Supplier extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'region_id',
        'country_id',
        'area_id',
        'location_id',
        'created_by'
    ];

    protected $table = "suppliers";

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
    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function location(){
        return $this->belongsTo(Locations::class,'location_id');
    }
}
