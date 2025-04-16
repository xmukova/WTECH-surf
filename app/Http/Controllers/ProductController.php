<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('product_details', compact('product'));
    }
}
