<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'table_number' => $this->table_number,
            'status' => $this->status,
            'current_order' => $this->when(
                $this->relationLoaded('currentOrder'),
                function () {
                    return $this->currentOrder ? [
                        'id' => $this->currentOrder->id,
                        'total' => (float) $this->currentOrder->total,
                        'created_at' => $this->currentOrder->created_at?->toDateTimeString(),
                    ] : null;
                }
            ),
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
