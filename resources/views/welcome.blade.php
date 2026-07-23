<x-app-layout>
    <x-slot name="header">
        Home
    </x-slot>

    <div class="py-12 bg-[#fafafa] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Hero / Banner Container -->
            <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-10 text-center space-y-4 shadow-md">
                <span class="text-xs font-mono font-bold uppercase tracking-[0.25em] text-[#047857]">
                    WELCOME TO TECHSTORE
                </span>
                <h1 class="text-3xl font-extrabold text-slate-900 uppercase tracking-[0.15em] font-mono">
                    MODERN TECH & ACCESSORIES
                </h1>
                <p class="text-xs text-slate-600 font-mono max-w-xl mx-auto">
                    Explore our latest collection of premium gear designed for high performance and sleek aesthetics.
                </p>
                <div class="pt-2">
                    <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 bg-black hover:bg-slate-800 text-white font-mono text-xs font-bold uppercase tracking-widest rounded-xl transition shadow-md active:scale-95">
                        Browse Catalog
                    </a>
                </div>
            </div>

            <!-- Featured Products Grid -->
            <div class="space-y-6">
                <div class="text-center">
                    <h2 class="text-xl font-extrabold text-slate-900 uppercase tracking-[0.2em] font-mono">
                        FEATURED PRODUCTS
                    </h2>
                </div>

                <!-- Compact Product Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach ($products as $product)
                        <div class="group relative bg-white max-w-[220px] mx-auto w-full rounded-xl p-3 border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                            
                            <!-- Smaller Image Container -->
                            <div class="relative w-full aspect-square bg-[#f8f8f8] rounded-lg overflow-hidden flex items-center justify-center p-3">
                                @if($product->image)
                                    <img 
                                        src="{{ asset('images/' . $product->image) }}" 
                                        alt="{{ $product->name }}" 
                                        class="w-full h-full object-contain transition-transform duration-500 ease-out group-hover:scale-110"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400 font-mono text-[10px]">
                                        No Image
                                    </div>
                                @endif
                            </div>

                            <!-- Compact Caption Section -->
                            <div class="mt-3 text-center space-y-1 flex-1 flex flex-col justify-between">
                                <div>
                                    <!-- Product Name -->
                                    <h3 class="text-[11px] font-bold text-slate-900 uppercase tracking-wider font-mono line-clamp-1">
                                        {{ $product->name }}
                                    </h3>
                                    
                                    <!-- Price in Dollars -->
                                    <p class="text-[11px] font-bold text-slate-800 font-mono mt-0.5">
                                        ${{ number_format($product->price, 2) }}
                                    </p>
                                </div>

                                <!-- Smaller Add to Cart Button -->
                                <div class="pt-2">
                                    <a 
                                        href="{{ route('add.to.cart', $product->id) }}" 
                                        class="w-full block py-2 bg-black hover:bg-slate-800 text-white font-mono text-[9px] font-bold uppercase tracking-widest rounded-lg transition shadow-xs active:scale-95"
                                    >
                                        Add To Cart
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>