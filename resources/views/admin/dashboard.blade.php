<x-app-layout>
    <div class="space-y-8">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="font-mono text-xs tracking-widest text-[#059669] font-bold uppercase mb-1 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#059669] animate-pulse"></span>
                    // SYSTEM_OVERVIEW
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#047857] tracking-tight">
                    Admin Dashboard Overview
                </h1>
            </div>

            <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#059669] hover:bg-[#047857] text-white font-mono text-xs font-bold uppercase tracking-wider rounded-2xl transition shadow-md">
                + Add New Product
            </a>
        </div>

        <!-- Glass Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="glass-card rounded-3xl p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="font-mono text-[10px] tracking-widest text-[#059669] font-bold uppercase">Total Orders</span>
                    <div class="p-2 rounded-xl bg-[#059669]/15 text-[#059669]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                </div>
                <div class="font-mono text-3xl font-extrabold text-slate-900">{{ $totalOrders ?? 0 }}</div>
            </div>

            <div class="glass-card rounded-3xl p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="font-mono text-[10px] tracking-widest text-[#059669] font-bold uppercase">Delivered Revenue</span>
                    <div class="p-2 rounded-xl bg-[#059669]/15 text-[#059669]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div class="font-mono text-3xl font-extrabold text-slate-900">${{ number_format($completedRevenue ?? $totalRevenue ?? 0, 2) }}</div>
            </div>

            <div class="glass-card rounded-3xl p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="font-mono text-[10px] tracking-widest text-[#009ACD] font-bold uppercase">Total Users</span>
                    <div class="p-2 rounded-xl bg-[#009ACD]/15 text-[#009ACD]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                </div>
                <div class="font-mono text-3xl font-extrabold text-slate-900">{{ $totalUsers ?? 0 }}</div>
            </div>

            <div class="glass-card rounded-3xl p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="font-mono text-[10px] tracking-widest text-amber-700 font-bold uppercase">Active Products</span>
                    <div class="p-2 rounded-xl bg-amber-100 text-amber-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                </div>
                <div class="font-mono text-3xl font-extrabold text-slate-900">{{ $activeProducts ?? $totalProducts ?? 0 }}</div>
            </div>

        </div>

        <!-- Orders Table -->
        <div class="glass-card rounded-3xl p-8">
            <h2 class="font-mono text-xs tracking-widest text-[#047857] font-bold uppercase mb-6 flex items-center gap-2">
                <span>// CUSTOMER_ORDERS</span>
            </h2>

            @if(!isset($orders) || $orders->isEmpty())
                <div class="py-16 text-center space-y-3">
                    <div class="w-12 h-12 mx-auto bg-white/50 border border-white/80 rounded-2xl flex items-center justify-center text-[#059669]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-xs font-mono text-[#047857] font-bold uppercase tracking-wider">No orders placed yet</h3>
                    <p class="text-xs text-slate-600 font-medium">Customer checkouts will populate here in real-time.</p>
                </div>
            @else
                <div class="overflow-x-auto rounded-2xl border border-white/70">
                    <table class="w-full text-left font-mono text-xs">
                        <thead class="bg-white/40 text-[#047857] uppercase tracking-wider border-b border-white/70 font-bold">
                            <tr>
                                <th class="py-3.5 px-5">Order ID</th>
                                <th class="py-3.5 px-5">Customer</th>
                                <th class="py-3.5 px-5">Total Amount</th>
                                <th class="py-3.5 px-5">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-900/10 text-slate-800">
                            @foreach($orders as $order)
                                <tr class="hover:bg-white/40 transition-colors">
                                    <!-- Order ID -->
                                    <td class="py-3.5 px-5 font-bold text-slate-900">
                                        #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                                    </td>
                                    
                                    <!-- Customer Name -->
                                    <td class="py-3.5 px-5 font-semibold">
                                        {{ $order->name ?? optional($order->user)->name ?? 'Guest User' }}
                                    </td>

                                    <!-- Total Amount -->
                                    <td class="py-3.5 px-5 font-bold text-slate-900">
                                        ${{ number_format($order->total_price ?? $order->total ?? 0, 2) }}
                                    </td>

                                    <!-- Interactive Status Dropdown Menu -->
                                    <td class="py-3.5 px-5">
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <select name="status" onchange="this.form.submit()" class="bg-white/90 border border-slate-300 text-[11px] font-mono font-bold rounded-xl px-2.5 py-1 focus:ring-2 focus:ring-[#059669] focus:outline-none cursor-pointer shadow-xs transition uppercase
                                                {{ $order->status == 'pending' ? 'text-amber-800 border-amber-300 bg-amber-50/80' : '' }}
                                                {{ $order->status == 'confirmed' ? 'text-blue-800 border-blue-300 bg-blue-50/80' : '' }}
                                                {{ $order->status == 'in transition' ? 'text-purple-800 border-purple-300 bg-purple-50/80' : '' }}
                                                {{ $order->status == 'delivered' ? 'text-emerald-800 border-emerald-300 bg-emerald-50/80' : '' }}">
                                                
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>PENDING</option>
                                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>CONFIRMED</option>
                                                <option value="in transition" {{ $order->status == 'in transition' ? 'selected' : '' }}>IN TRANSITION</option>
                                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>DELIVERED</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
</x-app-layout>