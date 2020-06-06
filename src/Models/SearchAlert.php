<?php

namespace Fevrok\SearchAlert\Models;

use Illuminate\Database\Eloquent\Model;

class SearchAlert extends Model
{
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
