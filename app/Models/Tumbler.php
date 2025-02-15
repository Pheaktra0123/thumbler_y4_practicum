<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tumbler extends Model
{
    use HasFactory;
    protected $fillable = [
        'tumbler_name',
        'category_id', // Corrected field name
        'model_id',
        'price',
        'stock',
        'rating',
        'description',
        'is_available',
        'colors',
        'sizes',
        'thumbnails', // Corrected field name
    ];
     // Cast JSON fields to arrays
     protected $casts = [
        'thumbnail'=> 'array',
        'colors' => 'array',
        'sizes' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function model()
    {
        return $this->belongsTo(ModelTumbler::class);
    }
}
