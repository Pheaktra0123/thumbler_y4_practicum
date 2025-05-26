<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // If you want to relate orders to tumblers (products), add:
    // public function tumblers()
    // {
    //     return $this->belongsToMany(Tumbler::class, 'order_tumbler');
    // }
}
