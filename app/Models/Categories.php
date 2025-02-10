<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Thumbnail'
    ];
    public function tumbler()
    {
        return $this->hasMany(Tumbler::class);
    }
    public function model_tumbler()
    {
        return $this->hasMany(ModelTumbler::class);
    }
}
