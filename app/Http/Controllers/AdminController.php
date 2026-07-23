<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show all orders and calculated metrics on the admin dashboard
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        
        // Calculate metrics for summary cards
        $totalOrders = $orders->count();
        $totalRevenue = $orders->where('status', 'delivered')->sum('total_price');
        $completedRevenue = $totalRevenue;
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $activeProducts = $totalProducts;

        // Points directly to resources/views/admin/dashboard.blade.php
        return view('admin.dashboard', compact(
            'orders', 
            'totalOrders', 
            'totalRevenue', 
            'completedRevenue',
            'totalUsers', 
            'totalProducts',
            'activeProducts'
        ));
    }

    // Update order status
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,in transition,delivered',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order #' . $order->id . ' status updated successfully!');
    }

    // Show all registered users for admin management
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Promote a regular user to an Admin
    public function promoteUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = 1;
        $user->save();

        return redirect()->back()->with('success', $user->name . ' has been promoted to Admin successfully!');
    }

    // Store a brand new admin user directly from the form
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 1,
        ]);

        return redirect()->back()->with('success', 'New Admin account created successfully!');
    }
}