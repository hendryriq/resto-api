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
     * Display a listing of orders
     */
    public function index(Request $request)
    {
        $query = Order::with(['table', 'user', 'items.food']);

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by table_id
        if ($request->has('table_id')) {
            $query->where('table_id', $request->table_id);
        }

        // Filter by date
        if ($request->has('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Order by newest first
        $query->orderBy('created_at', 'desc');

        $orders = $query->get();

        return response()->json([
            'success' => true,
            'data' => OrderResource::collection($orders),
        ], 200);
    }

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

    /**
     * Add item to order
     */
    public function addItem(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'food_id' => 'required|exists:foods,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $order = Order::with(['table', 'user', 'items.food'])->find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ], 404);
        }

        if ($order->status !== 'open') {
            return response()->json([
                'success' => false,
                'message' => 'Cannot add items to closed order',
            ], 400);
        }

        $food = \App\Models\Food::find($request->food_id);
        
        $orderItem = $order->items()->create([
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'price' => $food->price,
        ]);

        $order->load(['table', 'user', 'items.food']);

        return response()->json([
            'success' => true,
            'message' => 'Item added to order successfully',
            'data' => new OrderResource($order),
        ], 201);
    }

    /**
     * Close order
     */
    public function close($id)
    {
        $order = Order::with(['table', 'user', 'items.food'])->find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ], 404);
        }

        if ($order->status !== 'open') {
            return response()->json([
                'success' => false,
                'message' => 'Order is already closed',
            ], 400);
        }

        try {
            \DB::beginTransaction();

            $order->update(['status' => 'closed']);

            $order->table->update(['status' => 'available']);

            \DB::commit();

            $order->load(['table', 'user', 'items.food']);

            return response()->json([
                'success' => true,
                'message' => 'Order closed successfully',
                'data' => new OrderResource($order),
            ], 200);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to close order: ' . $e->getMessage(),
            ], 500);
        }
    }
}
