<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('variations')->get();
        return response()->json(['data' => ProductResource::collection($products)],200);
    }

    public function show(Product $product)
    {
        $product->load('variations');
        return response()->json(['data' => new ProductResource($product)],200);
    }






}
