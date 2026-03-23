<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'sizes'])->get();

        return response()->json(
            [
                "success" => true,
                "results" => $products
            ]
        );
    }

    public function show(Product $product)
    {

        $product->load(["category", "sizes"]);

        return response()->json(
            [
                "success" => true,
                "results" => $product
            ]
        );
    }
}
