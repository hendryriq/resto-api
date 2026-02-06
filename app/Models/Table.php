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
}
