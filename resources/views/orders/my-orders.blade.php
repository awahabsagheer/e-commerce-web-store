<x-app-layout>
    <x-slot name="header">
        My Order History
    </x-slot>

    <div class="py-8 min-h-screen bg-[#fafafa]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Section Title Header -->
            <div class="text-center mb-8 font-mono">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#047857]">
                    ACCOUNT HISTORY
                </span>
                <h1 class="text-2xl font-extrabold text-slate-900 uppercase tracking-[0.15em] mt-1">
                    PAST ORDERS
                </h1>
            </div>

            <!-- Light Glass Card Container -->
            <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md font-mono space-y-6">
                
                @if($orders->isEmpty())
                    <!-- Empty Purchase History State -->
                    <div class="text-center py-16 space-y-4">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-wider">No Purchase History</h3>
                        <p class="text-xs text-slate-500 max-w-sm mx-auto">
                            You haven't placed any orders yet. Check out our shop to get started!
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 bg-black hover:bg-slate-800 text-white font-mono text-xs font-bold uppercase tracking-widest rounded-xl transition shadow-md active:scale-95">
                                Go to Shop
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Orders Table -->
                    <div class="overflow-x-auto rounded-2xl border border-slate-300/70">
                        <table class="w-full text-left font-mono text-xs">
                            <thead class="bg-slate-300/50 text-[#047857] uppercase tracking-wider border-b border-slate-300/70 font-bold">
                                <tr>
                                    <th class="py-4 px-6">Order ID</th>
                                    <th class="py-4 px-6">Total Price</th>
                                    <th class="py-4 px-6">Status</th>
                                    <th class="py-4 px-6 text-right">Date Placed</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-300/60 text-slate-800">
                                @foreach($orders as $order)
                                    <tr class="hover:bg-slate-200/60 transition-colors">
                                        <!-- Order ID -->
                                        <td class="py-4 px-6 font-bold text-slate-900">#{{ $order->id }}</td>
                                        
                                        <!-- Total Price -->
                                        <td class="py-4 px-6 font-bold text-[#047857]">${{ number_format($order->total_price, 2) }}</td>
                                        
                                        <!-- Dynamic Status Badge -->
                                        <td class="py-4 px-6">
                                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase border
                                                {{ $order->status == 'pending' ? 'bg-amber-100 text-amber-800 border-amber-300' : 
                                                   ($order->status == 'shipped' ? 'bg-blue-100 text-blue-800 border-blue-300' : 'bg-emerald-100 text-emerald-800 border-emerald-300') }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        
                                        <!-- Date Placed -->
                                        <td class="py-4 px-6 text-right text-slate-600">{{ $order->created_at->format('d M Y, h:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>