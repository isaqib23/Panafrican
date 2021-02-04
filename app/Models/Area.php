<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = "areas";

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
