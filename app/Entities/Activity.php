<?php

namespace App\Entities;

use App\Models\Area;
use App\Models\Country;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Activity.
 *
 * @package namespace App\Entities;
 */
class Activity extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'topic',
        'target_date',
        'closing_date',
        'status',
        'completed',
        'account_id',
        'branch_id',
        'created_by',
        'region_id',
        'country_id',
        'area_id'
    ];

    protected $table = 'activities';

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
