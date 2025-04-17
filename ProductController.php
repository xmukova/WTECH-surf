<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller{ 

    private function applySorting(Request $request, $query){
        switch ($request->get('sort')) {
            case 'price_asc':
                return $query->orderBy('price', 'asc');
            case 'price_desc':
                return $query->orderBy('price', 'desc');
            case 'az':
                return $query->orderBy('name', 'asc');
            case 'za':
                return $query->orderBy('name', 'desc');
            // case 'popular':
            //     return $query->orderBy('popularity_score', 'desc'); 
            default:
                return $query->orderBy('created_at', 'desc');
        }
    }

    public function byCategory(Request $request, $category){
        $categoryModel = Category::where('name', ucfirst($category))->firstOrFail();
        $query = Product::where('category_id', $categoryModel->id);
        $query = $this->applySorting($request, $query);
        $products = $query->paginate(4);
        return view('products', compact('products'));
    }

    public function bySubcategory(Request $request, $category, $subcategory){
        $categoryModel = Category::where('name', ucfirst($category))->firstOrFail();
        $subcategoryModel = Subcategory::where('name', ucfirst($subcategory))
            ->where('category_id', $categoryModel->id)
            ->firstOrFail();
        $query = Product::where('subcategory_id', $subcategoryModel->id);
        $query = $this->applySorting($request, $query);
        $products = $query->paginate(16);
        return view('products', compact('products'));
    }

    public function index(Request $request){
        $query = Product::query();
        $query = $this->applySorting($request, $query);
        $products = $query->paginate(16);
        $categories = Category::all();
        return view('products', compact('products', 'categories'));
    }

    public function detail($id){
        $product = Product::findOrFail($id);
        return view('product_details', compact('product'));
    }
}
