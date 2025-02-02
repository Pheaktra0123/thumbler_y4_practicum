<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTumbler extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Thumbnail'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
