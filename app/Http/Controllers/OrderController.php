<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // *** Show the user's order history ***
    public function myOrders()
    {
        // Get all orders for this user, sorted by newest first
        $orders = Order::where('user_id', Auth::id())
                       ->with('items.product') // Load the items and product details
                       ->orderBy('created_at', 'desc')
                       ->get();

        return view('orders.my-orders', compact('orders'));
    }

    // Show the Checkout Page
    public function checkout()
    {
        return view('checkout');
    }

    // Handle the Order Submission
    public function store(Request $request)
    {
        // 1. Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:25',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'payment_method' => 'nullable|string|in:cod,card',
        ]);

        // 2. Calculate the total price from the cart
        $cart = session()->get('cart');
        
        // Safety check: Redirect if cart is empty
        if (!$cart) {
            return redirect()->route('products.index')->with('error', 'Your cart is empty!');
        }

        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        // 3. Create the Order in the Database
        $order = Order::create([
            // Use Auth::id() if logged in, otherwise set to null for guests
            'user_id' => Auth::check() ? Auth::id() : null, 
            'name' => $request->name,
            // Use their account email if logged in, otherwise null
            'email' => Auth::check() ? Auth::user()->email : null, 
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'payment_method' => $request->payment_method ?? 'cod',
            'total_price' => $total,
            'status' => 'pending',
        ]);

        // 4. Move items from Cart (Session) to OrderItems (Database)
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        // ==========================================
        // 5. LOYALTY POINTS LOGIC (Customers Only)
        // ==========================================
        $pointsEarned = 0;
        
        if (Auth::check() && !Auth::user()->is_admin) {
            $user = Auth::user();
            
            // Calculate points (1 point for every $10 spent, rounded down)
            $pointsEarned = (int) floor($total / 10);
            
            // Add points to the user's account and save
            $user->loyalty_points += $pointsEarned;
            $user->save();
        }

        // 6. Clear the Cart
        session()->forget('cart');

        // 7. Redirect with a dynamic success message
        if ($pointsEarned > 0) {
            $message = 'Order placed successfully! You earned ' . $pointsEarned . ' loyalty points.';
        } else {
            $message = 'Order placed successfully! We will contact you soon.';
        }

        return redirect()->route('products.index')->with('success', $message);
    }
}