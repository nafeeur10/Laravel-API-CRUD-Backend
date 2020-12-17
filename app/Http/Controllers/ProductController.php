<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $products = Product::latest()->get();
        return response()->json([
            'products' => ProductResource::collection($products)
        ], 200);
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return response()->json([
            'store_success' => 'Product stored successfully'
        ]);
    }

    public function show(Product $product)
    {
        return response()->json([
            'product' => new ProductResource($product)
        ], 200);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'update_success' => 'Product updated successfully'
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response([
            'delete_success' => 'Product Deleted Successfully'
        ], 200);
    }
}
