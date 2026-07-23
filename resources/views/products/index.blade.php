<x-app-layout>
    <x-slot name="header">
        Our Products
    </x-slot>

    <div class="py-12 bg-[#fafafa] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span class="text-[11px] font-mono font-bold uppercase tracking-[0.25em] text-slate-500 block mb-2">
                    EXPLORE CATALOG
                </span>
                <h1 class="text-3xl font-extrabold text-slate-900 uppercase tracking-[0.2em] font-mono">
                    OUR PRODUCTS
                </h1>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="group relative bg-white rounded-2xl p-4 border border-slate-200/60 shadow-sm hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                        
                        <!-- Image Container with Pop-out Effect -->
                        <div class="relative w-full aspect-square bg-[#f8f8f8] rounded-xl overflow-hidden flex items-center justify-center p-6">
                            @if($product->image)
                                <img 
                                    src="{{ asset('images/' . $product->image) }}" 
                                    alt="{{ $product->name }}" 
                                    class="w-full h-full object-contain transition-transform duration-500 ease-out group-hover:scale-110"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 font-mono text-xs">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <!-- Minimalist Caption Section -->
                        <div class="mt-5 text-center space-y-1.5 flex-1 flex flex-col justify-between">
                            <div>
                                <!-- Product Name -->
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-[0.15em] font-mono line-clamp-1">
                                    {{ $product->name }}
                                </h3>
                                
                                <!-- Price formatted with 2 decimal places -->
                                <p class="text-xs font-medium text-slate-600 font-mono mt-1">
                                    {{ number_format($product->price, 2) }} PKR
                                </p>
                            </div>

                            <!-- Add to Cart Button -->
                            <div class="pt-4">
                                <a 
                                    href="{{ route('add.to.cart', $product->id) }}" 
                                    class="w-full block py-2.5 bg-black hover:bg-slate-800 text-white font-mono text-[10px] font-bold uppercase tracking-[0.2em] rounded-xl transition shadow-sm active:scale-95"
                                >
                                    Add To Cart
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Empty State -->
            @if($products->isEmpty())
                <div class="text-center py-20">
                    <p class="text-xs font-mono uppercase tracking-widest text-slate-400">
                        No products available in the store yet.
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>