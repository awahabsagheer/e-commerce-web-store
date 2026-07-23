<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form to create a new product
    public function create()
    {
        return view('products.create');
    }

    // Store the new product in the database
    public function store(Request $request)
    {
        // 1. Validate data (Supports JPEG, PNG, JPG, GIF, WebP up to 2MB)
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageName = null;

        // 2. Handle the Image Upload
        if ($request->hasFile('image')) {
            // Generate a unique filename (e.g., 1712345678.jpg)
            $imageName = time() . '.' . $request->image->extension();  
            
            // Move the file to the 'public/images' folder directly
            $request->image->move(public_path('images'), $imageName);
        }

        // 3. Save to Database
        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Add item to cart
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name"     => $product->name,
                "quantity" => 1,
                "price"    => $product->price,
                "image"    => $product->image
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // View Cart
    public function cart()
    {
        return view('cart');
    }

    // Remove or Decrement item from Cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
            
            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
            
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Cart updated!');
    }
}