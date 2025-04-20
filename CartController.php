<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function step1()
    {
        if (Auth::check()) {
            $cartItems = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->orderBy('id') // alebo orderBy('id')
                ->get();
        } else {
            $cart = session()->get('cart', []);
            $cartItems = [];
        
            foreach ($cart as $item) {
                // ⛔️ Tu vznikal error, keď `$item` neobsahoval 'product_id'
                if (!isset($item['product_id'])) continue;
        
                $product = Product::find($item['product_id']);
                if ($product) {
                    $product->quantity = $item['quantity'];
                    $product->size = $item['size'];
                    $cartItems[] = $product;
                }
            }
        }
    
        // Výpočet celkovej ceny
        $total = 0;
        foreach ($cartItems as $item) {
            $product = $item instanceof \App\Models\Product ? $item : $item->product;
            $total += $product->price * $item->quantity;
        }
    
        // Vraciame pohľad s cartItems a celkovou cenou
        return view('shopping_cart1', [
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }
    
    
    
    public function addToCart(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1);
        $size = $request->input('select_size', null);
    
        if (Auth::check()) {
            // Skontrolujeme, či už existuje položka v košíku
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->where('size', $size)
                ->first();
    
            if ($cartItem) {
                // Zvýšime množstvo
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                // Vytvoríme novú položku
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $id,
                    'size' => $size,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            // Session verzia pre neprihláseného
            $cart = session()->get('cart', []);
            $found = false;
    
            foreach ($cart as &$item) {
                if (
                    is_array($item) &&
                    isset($item['product_id'], $item['size'], $item['quantity']) &&
                    $item['product_id'] == $id &&
                    $item['size'] == $size
                ) {
                    $item['quantity'] += $quantity;
                    $found = true;
                    break;
                }
            }
    
            if (!$found) {
                $cart[] = [
                    'product_id' => $id,
                    'quantity' => $quantity,
                    'size' => $size
                ];
            }
    
            session()->put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Product added to cart!');
    }    
    
    public function removeFromCart($id)
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->where('product_id', $id)->delete();
        } else {
            $cart = session()->get('cart', []);
            $updatedCart = [];
    
            foreach ($cart as $key => $item) {
                // Skontroluj, či položka je pole a má product_id
                if (!is_array($item) || !isset($item['product_id']) || $item['product_id'] != $id) {
                    $updatedCart[$key] = $item; // nechajme túto položku v košíku
                }
                // Inak ju neuložíme = odstránime
            }
    
            session()->put('cart', $updatedCart);
        }
    
        return redirect()->route('shopping_cart1')->with('success', 'Product removed from cart.');
    }

    public function updateCartItem(Request $request, $id)
    {
        $newSize = $request->input('select_size');
        $newQuantity = $request->input('quantity');

        if (Auth::check()) {
            // Vyhľadaj existujúcu položku
            $item = CartItem::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->first();

            if ($item) {
                $item->size = $newSize;
                $item->quantity = $newQuantity;
                $item->save();
            }
        } else {
            $cart = session()->get('cart', []);

            foreach ($cart as &$item) {
                if ($item['product_id'] == $id) {
                    $item['size'] = $newSize;
                    $item['quantity'] = $newQuantity;
                    break;
                }
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart item updated.');
    }

    
    public function showCart()
    {
        // Ak je používateľ prihlásený, získame položky z databázy
        if (auth()->check()) {
            $cartItems = CartItem::where('user_id', auth()->id())->get();
        } else {
            // Ak nie je prihlásený, použijeme session na získanie položiek v košíku
            $cartItems = session()->get('cart', []);
        }
    
        // Výpočet celkovej ceny
        $total = 0;
        foreach ($cartItems as $item) {
            // Ak používame databázový model
            if (is_object($item)) {
                $total += $item->price * $item->quantity;
            }
            // Ak používame session dáta
            else {
                $total += $item['price'] * $item['quantity'];
            }
        }
    
        // Odovzdanie položiek košíka a celkovej ceny do šablóny
        return view('shopping_cart1', compact('cartItems', 'total'));
    }
    
    
    
    public function step2()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the authenticated user's information
            $user = Auth::user();
    
            // Split the name into first name and last name
            $nameParts = explode(' ', $user->name);
            $firstName = $nameParts[0]; // First part is the first name
            $lastName = isset($nameParts[1]) ? $nameParts[1] : ''; // Second part is the last name
    
            // Get the cart items from the database
            $cartItems = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->orderBy('id')
                ->get();
        } else {
            // Handle guest user (session data)
            $cart = session()->get('cart', []);
            $cartItems = [];
    
            foreach ($cart as $item) {
                if (!isset($item['product_id'])) continue;
    
                $product = Product::find($item['product_id']);
                if ($product) {
                    $product->quantity = $item['quantity'];
                    $product->size = $item['size'];
                    $cartItems[] = $product;
                }
            }
    
            // Set default values for the fields
            $firstName = '';
            $lastName = '';
            $phone = '';
            $email = '';
            $country = '';
        }
    
        // Calculate the total cost of the cart
        $total = 0;
        foreach ($cartItems as $item) {
            $product = $item instanceof \App\Models\Product ? $item : $item->product;
            $total += $product->price * $item->quantity;
        }
    
        // Return the view with cart items and user information
        return view('shopping_cart2', [
            'cartItems' => $cartItems,
            'total' => $total,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $user->phone_number ?? $phone,
            'email' => $user->email ?? $email,
            'country' => $user->country ?? $country,
        ]);
    }
    
    
    public function step3()
    {
        return view('shopping_cart3');
    }
}
