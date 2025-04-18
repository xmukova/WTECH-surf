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

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")
                  ->orWhere('short_description', 'ILIKE', "%{$search}%");
            });
        }

        $currentCategory = $categoryModel->name;
        $query = $this->applySorting($request, $query);
        $products = $query->paginate(4);
        return view('products', compact('products', 'currentCategory'));
    }

    public function bySubcategory(Request $request, $category, $subcategory){
        $categoryModel = Category::where('name', ucfirst($category))->firstOrFail();
        $subcategoryModel = Subcategory::where('name', ucfirst($subcategory))
            ->where('category_id', $categoryModel->id)
            ->firstOrFail();
        $query = Product::where('subcategory_id', $subcategoryModel->id);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")
                  ->orWhere('short_description', 'ILIKE', "%{$search}%");
            });
        }    

        $query = $this->applySorting($request, $query);
        $products = $query->paginate(16);
        return view('products', compact('products'));
    }

    public function index(Request $request){
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
    
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")                  // podla name
                  ->orWhere('short_description', 'ILIKE', "%{$search}%"); // podla short_description
            });
        }
        
        $query = $this->applySorting($request, $query); //sortnutie ak treba
        $products = $query->paginate(16);
        $categories = Category::all();
        $currentCategory = '';
        return view('products', compact('products', 'currentCategory'));
    }

    public function homepage()
    {
        $surfboards = Product::with('mainImage')->whereHas('category', function ($query) {
            $query->where('name', 'Surfboards');
        })->limit(4)->get();       
        
        $equipment = Product::with('mainImage')->whereHas('category', function ($query) {
            $query->where('name', 'Equipment');
        })->limit(4)->get();
    
        $accessories = Product::with('mainImage')->whereHas('category', function ($query) {
            $query->where('name', 'Accessories');
        })->limit(4)->get();
    
        return view('homepage', compact('surfboards', 'equipment', 'accessories'));
    }
      

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $features = explode(', ', $product->features); // Rozdelí reťazec na pole podľa čiarky
    
        // Predpokladáme, že obrázky sú uložené v stĺpci 'images' ako JSON reťazec
        $images = json_decode($product->images); 
    
        // Ak obrázky nie sú k dispozícii alebo ich je menej než 3, pridáme náhradné obrázky
        while (count($images) < 3) {
            $images[] = 'images/detail_green.jpg'; // Pridaj placeholder obrázok
        }

        $all_products = Product::all();
    
        return view('product_detail', compact('product', 'features', 'images', 'all_products'));
    }
    
    public function showProfile()
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);
        return view('profile', compact('user', 'all_products'));
    }


}