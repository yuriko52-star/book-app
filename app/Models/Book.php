<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'status',
        'rating',
        'memo',
        'started_at',
        'finished_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
