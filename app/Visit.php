<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'name',
        'email',
        'ip',
        'country',
        'city',
        'request',
        'page',
        'browser',
        'platform',
        'device_type',
        'ismobiledevice'
    ];

}
