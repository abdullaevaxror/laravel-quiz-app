<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable=[
        'quiz_id',
        'user_id',
        'started_at',
        'finished_at',
    ];
}
