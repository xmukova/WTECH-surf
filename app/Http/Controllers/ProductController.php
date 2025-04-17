<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    public function byCategory($category){
        $categoryModel = Category::where('name', ucfirst($category))->firstOrFail();
        $products = Product::where('category_id', $categoryModel->id)->get();

        return view('products', compact('products'));
    }

    public function bySubcategory($category, $subcategory){
        $categoryModel = Category::where('name', ucfirst($category))->firstOrFail();
        $subcategoryModel = Subcategory::where('name', ucfirst($subcategory))
            ->where('category_id', $categoryModel->id)
            ->firstOrFail();

        $products = Product::where('subcategory_id', $subcategoryModel->id)->get();

        return view('products', compact('products'));
    }

    public function index(Request $request){
        $query = Product::query();
        $products = $query->paginate(12);
        $categories = Category::all();

        return view('products', compact('products', 'categories'));
    }

    public function detail($id){
        $product = Product::findOrFail($id);
        return view('product_details', compact('product'));
    }
}
