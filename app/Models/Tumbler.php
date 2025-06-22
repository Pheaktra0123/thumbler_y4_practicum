<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
  // Accessor for first thumbnail
    public function getFirstThumbnailAttribute()
    {
        $thumbnails = $this->thumbnails ?? [];
        return !empty($thumbnails) 
            ? Storage::url($thumbnails[0])
            : asset('images/default.png');
    }

    // Accessor for all thumbnails with fallback
    public function getAllThumbnailsAttribute()
    {
        $thumbnails = $this->thumbnails ?? [];
        return !empty($thumbnails) 
            ? $thumbnails 
            : ['default.png'];
    }
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function model()
    {
        return $this->belongsTo(ModelTumbler::class);
    }
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }
}
