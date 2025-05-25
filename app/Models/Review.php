<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'tumbler_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function tumbler()
    {
        return $this->belongsTo(\App\Models\Tumbler::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
