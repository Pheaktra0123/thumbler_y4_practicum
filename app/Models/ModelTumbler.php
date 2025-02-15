<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTumbler extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Thumbnail',
        'categories_id',
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function tumbler()
    {
        return $this->hasMany(Tumbler::class);
    }
}
