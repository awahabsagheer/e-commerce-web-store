<x-app-layout>
    <x-slot name="header">
        Shopping Cart
    </x-slot>

    <div class="py-4 space-y-8">
        <!-- Light Greyish Glass Card Container -->
        <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md space-y-6">
            
            <div class="overflow-x-auto rounded-2xl border border-slate-300/70">
                <table class="w-full text-left font-mono text-xs">
                    <thead class="bg-slate-300/50 text-[#047857] uppercase tracking-wider border-b border-slate-300/70 font-bold">
                        <tr>
                            <th class="py-4 px-6">Product</th>
                            <th class="py-4 px-6">Price</th>
                            <th class="py-4 px-6 text-center">Quantity</th>
                            <th class="py-4 px-6">Subtotal</th>
                            <th class="py-4 px-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-300/60 text-slate-800">
                        @if(session('cart') && count(session('cart')) > 0)
                            @foreach(session('cart') as $id => $details)
                                <tr class="hover:bg-slate-200/60 transition-colors">
                                    <td class="py-4 px-6 font-semibold text-slate-900 flex items-center gap-3">
                                        @if(isset($details['image']))
                                            <img src="{{ asset('images/' . $details['image']) }}" class="w-10 h-10 object-contain rounded-lg bg-white/80 p-1 border border-slate-300">
                                        @endif
                                        <span class="uppercase tracking-wide font-bold">{{ $details['name'] }}</span>
                                    </td>
                                    
                                    <!-- Price in Dollars with Decimals -->
                                    <td class="py-4 px-6 font-bold text-slate-900">${{ number_format($details['price'], 2) }}</td>
                                    
                                    <!-- Quantity Column with (-) and (+) Logic -->
                                    <td class="py-4 px-6">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Decrement / Remove (-) Button -->
                                            <a href="{{ route('update.cart', $id) }}" class="w-7 h-7 rounded-lg bg-white/80 hover:bg-white text-[#047857] border border-slate-300 flex items-center justify-center font-bold text-sm shadow-sm transition active:scale-95">
                                                -
                                            </a>

                                            <!-- Display Quantity -->
                                            <span class="font-mono font-bold text-slate-900 px-2 min-w-[20px] text-center">
                                                {{ $details['quantity'] }}
                                            </span>

                                            <!-- Increment (+) Button -->
                                            <a href="{{ route('add.to.cart', $id) }}" class="w-7 h-7 rounded-lg bg-white/80 hover:bg-white text-[#047857] border border-slate-300 flex items-center justify-center font-bold text-sm shadow-sm transition active:scale-95">
                                                +
                                            </a>
                                        </div>
                                    </td>

                                    <!-- Subtotal in Dollars with Decimals -->
                                    <td class="py-4 px-6 font-bold text-slate-900">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{ route('remove.from.cart', $id) }}" class="text-rose-600 font-bold hover:underline">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="py-16 text-center text-slate-700 font-mono text-xs tracking-wider">
                                    Your cart is empty.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Cart Footer Actions & Total -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-slate-300/70">
                <a href="{{ route('products.index') }}" class="px-6 py-3 bg-white/80 hover:bg-white text-[#047857] border border-[#059669]/40 font-mono text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm">
                    Continue Shopping
                </a>

                <div class="flex items-center gap-6">
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                    @endif

                    <!-- Total in Dollars with Decimals -->
                    <div class="font-mono text-xl font-extrabold text-slate-900">
                        Total: <span class="text-[#047857]">${{ number_format($total, 2) }}</span>
                    </div>

                    @if(session('cart') && count(session('cart')) > 0)
                        <a href="{{ route('checkout.show') }}" class="px-6 py-3 bg-[#059669] hover:bg-[#047857] text-white font-mono text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-md">
                            Checkout
                        </a>
                    @else
                        <button disabled class="px-6 py-3 bg-slate-300/70 text-slate-500 font-mono text-xs font-bold uppercase tracking-wider rounded-xl cursor-not-allowed border border-slate-300">
                            Checkout
                        </button>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>