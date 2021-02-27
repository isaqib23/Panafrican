<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Bom.
 *
 * @package namespace App\Entities;
 */
class Bom extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'part_id',
        'quantity',
        'machine_model'
    ];

    protected $table = "boms";

    /**
     * @return BelongsTo
     */
    public function part(){
        return $this->belongsTo(BomPart::class, 'part_id');
    }
}
