<?php

namespace Fevrok\SearchAlert\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchAlert extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'model',
        'query',
        'duration',
        'channel',
        'last_alert',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'query' => 'object',
    ];
}
