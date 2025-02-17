<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'title',
        'slug',
        'description',
        'time_limit',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);

    }
}
