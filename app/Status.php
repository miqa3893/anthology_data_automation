<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'twitter_id';

    protected $fillable = [
        'twitter_id',
        'submit_status',
        'selling_enabled'
    ];

}
