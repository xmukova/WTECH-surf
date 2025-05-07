<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Subcategory;

class AdminController extends Controller{
    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin_profile'); // Vytvor si túto route neskôr
            } else {
                Auth::logout();
                return redirect()->route('admin_login')
                    ->withErrors(['email' => 'Unauthorized access into admin account.'], 'login')
                    ->withInput();
            }
        }else{
            return redirect()->route('admin_login')
                ->withErrors(['email' => 'Login failed, invalid email or password'], 'login')
                ->withInput();
        }
    }

    public function profile(){
        if (Auth::check() && Auth::user()->is_admin) {
            $admin = Auth::user();
            $products = Product::with(['category', 'subcategory', 'mainImage'])->get();
            $subcategories = Subcategory::all();
            return view('admin_profile', compact('products', 'subcategories'));
        } else {
            return redirect()->route('homepage');
        }
    }

    public function add(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'size' => 'required|array',
            'color' => 'required|array',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // získa category_id zo subkategórie
        $subcategory = Subcategory::findOrFail($validated['subcategory_id']);
        $categoryID = $subcategory->category_id;

        $product = Product::create([
            'name' => $validated['name'],
            'subcategory_id' => $validated['subcategory_id'],
            'category_id' => $categoryID,
            'stock' => $validated['stock'],
            'price' => $validated['price'],
            'size' => implode(',', $validated['size']),
            'color' => implode(',', $validated['color']), 
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'features' => $request->input('features'),
        ]);

        foreach ($request->file('images') as $index => $image) {
            $filename = $image->getClientOriginalName(); 
            $image->move(public_path('images/products'), $filename); // vlozenie obrazka do obrazkov
        
            $product->images()->create([
                'image_path' => 'images/products/' . $filename, 
                'is_main' => $index === 0
            ]);
        }
        
        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function delete(Product $product)    {
        //zmazanie obrazkov pre produkt v databaze
        foreach ($product->images as $image) {
            $image->delete(); 
        }
        $product->delete(); //zmazane produktu z databazy
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }


    public function edit(Request $request, Product $product){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'size' => 'required|array',
            'color' => 'required|array',
            'new_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        $product->name = $validated['name'];
        $product->subcategory_id = $validated['subcategory_id'];
        $subcategory = Subcategory::findOrFail($validated['subcategory_id']);
        $product->category_id = $subcategory->category_id;
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->short_description = $validated['short_description'] ?? '';
        $product->description = $validated['description'] ?? '';
        $product->features = $validated['features'] ?? '';
        $product->size =  implode(',', $validated['size']);
        $product->color =  implode(',', $validated['color']);
        $product->save();
    
        // obrazok
        if ($request->hasFile('new_photo')) {
            $image = $request->file('new_photo');
            $path = $image->store('product_images', 'public');
    
            $product->images()->create([
                'image_path' => 'storage/' . $path,
            ]);
        }
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('homepage');
    }
}