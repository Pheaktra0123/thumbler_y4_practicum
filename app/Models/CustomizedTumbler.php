<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizedTumbler extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tumbler_id',
        'engraving',
        'font',
        'color',
        'quantity',
        'image',
    ];

    // Relationships (optional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tumbler()
    {
        return $this->belongsTo(Tumbler::class);
    }
}
