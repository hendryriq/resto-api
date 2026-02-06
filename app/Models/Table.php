<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Table extends Model
{
    protected $table = 'tables';
    
    protected $fillable = [
        'table_number',
        'status',
    ];

    protected $casts = [
        'table_number' => 'integer',
    ];

    /**
     * Get all orders for this table
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the current open order for this table
     */
    public function currentOrder(): HasOne
    {
        return $this->hasOne(Order::class)->where('status', 'open');
    }

    /**
     * Check if table is available
     */
    public function isAvailable(): bool
    {
        return $this->status === 'available' && !$this->currentOrder()->exists();
    }

    /**
     * Open a new order on this table
     */
    public function openOrder(User $user): Order
    {
        if (!$this->isAvailable()) {
            throw new \Exception('Table is not available');
        }

        \DB::beginTransaction();
        try {
            $order = $this->orders()->create([
                'user_id' => $user->id,
                'status' => 'open',
                'total' => 0,
            ]);

            $this->update(['status' => 'occupied']);

            \DB::commit();
            return $order;
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }

    /**
     * Close the current order and mark table as available
     */
    public function closeCurrentOrder(): void
    {
        $currentOrder = $this->currentOrder;
        
        if ($currentOrder) {
            $currentOrder->update(['status' => 'closed']);
            $this->update(['status' => 'available']);
        }
    }
}
