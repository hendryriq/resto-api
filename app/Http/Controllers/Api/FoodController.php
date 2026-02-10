<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Http\Resources\FoodResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of foods
     */
    public function index(Request $request)
    {
        $query = Food::query();

        // Filter by category
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Order by
        $query->orderBy('category')->orderBy('name');

        $foods = $query->get();

        return response()->json([
            'success' => true,
            'data' => FoodResource::collection($foods),
        ], 200);
    }

    /**
     * Store a newly created food
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:100',
            'image_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $food = Food::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Food created successfully',
            'data' => new FoodResource($food),
        ], 201);
    }

    /**
     * Display the specified food
     */
    public function show($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'Food not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new FoodResource($food),
        ], 200);
    }

    /**
     * Update the specified food
     */
    public function update(Request $request, $id)
    {
        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'Food not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:100',
            'image_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $food->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Food updated successfully',
            'data' => new FoodResource($food),
        ], 200);
    }

    /**
     * Remove the specified food
     */
    public function destroy($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'Food not found',
            ], 404);
        }

        $food->delete();

        return response()->json([
            'success' => true,
            'message' => 'Food deleted successfully',
        ], 200);
    }
}