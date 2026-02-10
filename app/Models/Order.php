<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $table = 'orders';
    
    protected $fillable = [
        'table_id',
        'user_id',
        'status',
        'total',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    /**
     * Get the table for this order
     */
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    /**
     * Get the user (pelayan) who created this order
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all items in this order
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Recalculate and update the order total
     */
    public function updateTotal(): void
    {
        $total = $this->items()->sum('subtotal');
        $this->update(['total' => $total]);
    }
}
