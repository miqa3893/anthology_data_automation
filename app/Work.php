<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $primaryKey = 'twitter_id';

    protected $fillable = [
        'twitter_id',
        'work_no',
        'work_path',
        'work_name',
        'work_title',
        'comment',
        'character_code',
        'year_code'
    ];
}
