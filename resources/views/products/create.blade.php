<x-app-layout>
    <x-slot name="header">
        Add New Product
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Light Smoke Grey Card -->
            <div class="bg-slate-200/60 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md">
                
                <header class="mb-6">
                    <h2 class="text-xl font-extrabold text-[#047857] tracking-tight">
                        Product Details
                    </h2>
                    <p class="mt-1 text-xs text-slate-700 font-medium">
                        Fill in the details below to add a new item to your store catalog.
                    </p>
                </header>

                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">
                            Product Name
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') }}" 
                            required 
                            placeholder="e.g., Wireless Gaming Mouse"
                            class="w-full bg-white/70 border border-slate-300/80 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition"
                        >
                        @error('name')
                            <p class="mt-2 text-xs text-rose-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">
                            Description
                        </label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            required 
                            placeholder="Brief description of the product features..."
                            class="w-full bg-white/70 border border-slate-300/80 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-xs text-rose-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">
                            Price ($)
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="price" 
                            id="price" 
                            value="{{ old('price') }}" 
                            required 
                            placeholder="29.99"
                            class="w-full bg-white/70 border border-slate-300/80 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition"
                        >
                        @error('price')
                            <p class="mt-2 text-xs text-rose-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Image -->
                    <div>
                        <label for="image" class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">
                            Product Image
                        </label>
                        <input 
                            type="file" 
                            name="image" 
                            id="image" 
                            accept="image/*"
                            class="w-full bg-white/70 border border-slate-300/80 rounded-xl px-4 py-2.5 text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-mono file:font-bold file:bg-[#059669] file:text-white hover:file:bg-[#047857] transition cursor-pointer"
                        >
                        @error('image')
                            <p class="mt-2 text-xs text-rose-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-[#059669] hover:bg-[#047857] text-white font-mono text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-md"
                        >
                            Save Product
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>