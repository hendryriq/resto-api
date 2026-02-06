<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Http\Resources\TableResource;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of tables
     */
    public function index(Request $request)
    {
        $query = Table::query();

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Load current order if requested
        if ($request->boolean('with_order')) {
            $query->with('currentOrder');
        }

        // Order by table number
        $query->orderBy('table_number');

        $tables = $query->get();

        return response()->json([
            'success' => true,
            'data' => TableResource::collection($tables),
        ], 200);
    }
}
