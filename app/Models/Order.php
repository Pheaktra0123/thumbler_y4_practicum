<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'shipping_address',
        'payment_method',
        'phone_number',
        'status',
        'coordinates',
        'bank_slip_path'
    ];
    // In your Order model
    
    public function scopeVisibleToUser($query)
    {
        return $query->where('hidden_for_user', false);
    }

    // Then in your controller where you fetch orders:


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class)
            ->when(Schema::hasColumn('order_items', 'hidden_for_user'), function ($query) {
                $query->where('hidden_for_user', false);
            });
    }
}