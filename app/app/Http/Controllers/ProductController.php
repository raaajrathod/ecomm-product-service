<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request): JsonResponse
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show($id): JsonResponse
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id): JsonResponse
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}
