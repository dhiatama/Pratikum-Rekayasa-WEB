<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
{
    $products = [
        ['id' => 1, 'name' => 'Product A', 'price' => 10000],
        ['id' => 2, 'name' => 'Product B', 'price' => 20000],
        ['id' => 3, 'name' => 'Product C', 'price' => 30000],
    ];

    return response()->json($products);
}
}
