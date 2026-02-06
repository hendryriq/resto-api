<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Table;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Store a newly created order (open new order)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'table_id' => 'required|exists:tables,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $table = Table::find($request->table_id);

        // Check if table is available
        if ($table->status !== 'available') {
            return response()->json([
                'success' => false,
                'message' => 'Table is already occupied',
            ], 400);
        }

        // Check if table already has an open order
        if ($table->currentOrder()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Table already has an open order',
            ], 400);
        }

        try {
            // Open order using Table model method
            $order = $table->openOrder($request->user());
            
            // Load relationships for response
            $order->load(['table', 'user', 'items']);

            return response()->json([
                'success' => true,
                'message' => 'Order opened successfully',
                'data' => new OrderResource($order),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to open order: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified order
     */
    public function show($id)
    {
        $order = Order::with(['table', 'user', 'items.food'])->find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new OrderResource($order),
        ], 200);
    }
}
