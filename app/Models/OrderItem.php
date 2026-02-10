<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $table = 'order_items';
    
    protected $fillable = [
        'order_id',
        'food_id',
        'quantity',
        'price',
        'subtotal',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically calculate subtotal before saving
        static::saving(function ($orderItem) {
            $orderItem->subtotal = $orderItem->price * $orderItem->quantity;
        });

        // Update order total after creating/updating/deleting
        static::saved(function ($orderItem) {
            $orderItem->order->updateTotal();
        });

        static::deleted(function ($orderItem) {
            $orderItem->order->updateTotal();
        });
    }

    /**
     * Get the order this item belongs to
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the food item
     */
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
