<x-app-layout>
    <x-slot name="header">
        Checkout
    </x-slot>

    <div class="py-8 min-h-screen bg-[#fafafa]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Light Glass Card Container -->
            <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md space-y-6 font-mono">
                
                <!-- Loyalty Points Banner for Guests -->
                @guest
                    <div class="bg-lime-100/90 border border-lime-400 text-lime-900 px-5 py-4 rounded-2xl flex flex-col md:flex-row justify-between items-center gap-4 shadow-xs">
                        <span class="text-xs">
                            <strong class="font-bold">Want to earn loyalty points on this order?</strong> Create an account before you check out!
                        </span>
                        <a href="{{ route('register') }}" class="bg-lime-500 hover:bg-lime-600 text-slate-900 font-bold text-xs uppercase tracking-wider py-2.5 px-4 rounded-xl whitespace-nowrap transition shadow-xs active:scale-95">
                            Register Now
                        </a>
                    </div>
                @endguest

                <!-- Validation Error Message Alert Block -->
                @if ($errors->any())
                    <div class="bg-rose-100/90 border border-rose-400 text-rose-800 px-5 py-4 rounded-2xl text-xs space-y-1 shadow-xs" role="alert">
                        <strong class="font-bold uppercase tracking-wider block">Please fix the following errors:</strong>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('place.order') }}" method="POST" x-data="{ paymentMethod: 'cod' }" class="space-y-8">
                    @csrf

                    <!-- Form Title -->
                    <div class="border-b border-slate-300/70 pb-4">
                        <h3 class="text-xl font-extrabold text-slate-900 uppercase tracking-[0.15em]">
                            Shipping & Payment Details
                        </h3>
                    </div>

                    <!-- 1. Shipping Details -->
                    <div class="space-y-4">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#047857]">
                            1. Shipping Address
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Full Name -->
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-slate-700 mb-1">Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-white/80 border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669] focus:border-transparent transition shadow-xs" placeholder="e.g. John Doe">
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-slate-700 mb-1">Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full bg-white/80 border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669] focus:border-transparent transition shadow-xs" placeholder="+1 234 567 890">
                            </div>
                        </div>

                        <!-- Address -->
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-slate-700 mb-1">Address</label>
                            <textarea name="address" required rows="3" class="w-full bg-white/80 border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669] focus:border-transparent transition shadow-xs" placeholder="123 Main Street, Apt or Suite">{{ old('address') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- City -->
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-slate-700 mb-1">City</label>
                                <input type="text" name="city" value="{{ old('city') }}" required class="w-full bg-white/80 border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669] focus:border-transparent transition shadow-xs" placeholder="e.g. New York">
                            </div>

                            <!-- Zip Code -->
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-slate-700 mb-1">Zip Code</label>
                                <input type="text" name="zip_code" value="{{ old('zip_code') }}" required class="w-full bg-white/80 border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669] focus:border-transparent transition shadow-xs" placeholder="10001">
                            </div>
                        </div>
                    </div>

                    <!-- 2. Payment Method Options -->
                    <div class="space-y-4 pt-4 border-t border-slate-300/70">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#047857]">
                            2. Select Payment Method
                        </h4>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Cash on Delivery Radio Card -->
                            <label :class="paymentMethod === 'cod' ? 'border-[#059669] bg-white' : 'border-slate-300 bg-white/60'" class="border-2 rounded-2xl p-4 flex items-center gap-3 cursor-pointer transition-all shadow-xs hover:bg-white">
                                <input type="radio" name="payment_method" value="cod" x-model="paymentMethod" class="text-[#059669] focus:ring-[#059669]">
                                <div>
                                    <span class="block text-xs font-bold uppercase text-slate-900">Cash on Delivery</span>
                                    <span class="block text-[10px] text-slate-500">Pay cash upon delivery</span>
                                </div>
                            </label>

                            <!-- Credit / Debit Card Radio Card -->
                            <label :class="paymentMethod === 'card' ? 'border-[#059669] bg-white' : 'border-slate-300 bg-white/60'" class="border-2 rounded-2xl p-4 flex items-center gap-3 cursor-pointer transition-all shadow-xs hover:bg-white">
                                <input type="radio" name="payment_method" value="card" x-model="paymentMethod" class="text-[#059669] focus:ring-[#059669]">
                                <div>
                                    <span class="block text-xs font-bold uppercase text-slate-900">Credit / Debit Card</span>
                                    <span class="block text-[10px] text-slate-500">Pay securely online</span>
                                </div>
                            </label>
                        </div>

                        <!-- Card Details Fields (Shows when 'card' is selected) -->
                        <div x-show="paymentMethod === 'card'" x-transition class="bg-white/90 border border-slate-300 rounded-2xl p-5 space-y-4 mt-4">
                            <div>
                                <label class="block text-[10px] font-bold uppercase text-slate-700 mb-1">Card Number</label>
                                <input type="text" placeholder="1234 5678 9101 1121" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669]">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase text-slate-700 mb-1">Expiry Date</label>
                                    <input type="text" placeholder="MM/YY" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669]">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase text-slate-700 mb-1">CVC / CVV</label>
                                    <input type="text" placeholder="123" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#059669]">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer / Order Total & Submit -->
                    <div class="pt-6 border-t border-slate-300/70 flex flex-col sm:flex-row items-center justify-between gap-4">
                        @php $total = 0; @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach

                        <div>
                            <span class="text-[10px] uppercase text-slate-500 font-bold tracking-widest block">Total to Pay</span>
                            <span class="text-2xl font-extrabold text-slate-900">${{ number_format($total, 2) }}</span>
                        </div>

                        <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#059669] hover:bg-[#047857] text-white text-xs font-bold uppercase tracking-widest rounded-xl transition shadow-md active:scale-95">
                            Place Order
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>