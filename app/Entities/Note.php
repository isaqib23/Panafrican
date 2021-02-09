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
 * Class Note.
 *
 * @package namespace App\Entities;
 */
class Note extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "description",
        "type",
        "type_id",
        "branch_id",
        "created_by",
        "country_id",
        "region_id",
        "area_id"
    ];

    protected $table = 'notes';

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
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    /**
     * @return BelongsTo
     */
    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
}
