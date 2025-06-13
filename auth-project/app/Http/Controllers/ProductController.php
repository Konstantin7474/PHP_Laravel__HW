<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|unique:products',
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

   /*  public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'sku' => 'required|string|unique:products',
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $e->errors(),
        ], 422);
        
    } catch (\Exception $e) {
        Log::error('Error in ProductController@store: ' . $e->getMessage());
        return response()->json([
            'message' => 'Server error',
            'error' => $e->getMessage(), // Только для разработки!
        ], 500);
    }
} */










    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'sku' => 'sometimes|required|string|unique:products,sku,' . $product->id,
            'name' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
        ]);

        $product->update($validated);
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}
