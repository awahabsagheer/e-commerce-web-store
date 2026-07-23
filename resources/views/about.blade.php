<x-app-layout>
    <x-slot name="header">
        About Us
    </x-slot>

    <div class="py-4">
        <!-- Main Glass Container -->
        <div class="glass-card rounded-3xl p-8 sm:p-12 space-y-8">
            
            <div class="max-w-3xl space-y-3">
                <h1 class="text-3xl sm:text-4xl font-mono font-bold text-[#047857] tracking-tight">
                    Welcome to <span class="text-[#009ACD]">TechStore</span>
                </h1>
                <p class="text-slate-700 text-sm leading-relaxed font-medium">
                    We are passionate about bringing you the best technology products. Founded with a vision to make high-quality electronics accessible, we source top-tier gadgets, components, and accessories for developers, gamers, and everyday users alike.
                </p>
            </div>

            <!-- Glass Sub-cards -->
            <div class="border-t border-slate-900/10 pt-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Card 1 -->
                    <div class="bg-white/40 border border-white/70 p-6 sm:p-8 rounded-2xl shadow-sm hover:shadow-md transition-all">
                        <div class="w-10 h-10 rounded-xl bg-[#059669]/15 border border-[#059669]/30 flex items-center justify-center text-[#059669] mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="font-mono text-xs font-bold text-[#047857] tracking-widest uppercase mb-2">
                            OUR MISSION
                        </h3>
                        <p class="text-slate-600 text-xs sm:text-sm font-medium leading-relaxed">
                            To deliver exceptional value, reliable tech products, and outstanding customer service. Whether you are building a custom setup or upgrading your daily gear, we are here to support your journey.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white/40 border border-white/70 p-6 sm:p-8 rounded-2xl shadow-sm hover:shadow-md transition-all">
                        <div class="w-10 h-10 rounded-xl bg-[#059669]/15 border border-[#059669]/30 flex items-center justify-center text-[#059669] mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3 class="font-mono text-xs font-bold text-[#047857] tracking-widest uppercase mb-2">
                            QUALITY GUARANTEE
                        </h3>
                        <p class="text-slate-600 text-xs sm:text-sm font-medium leading-relaxed">
                            Every item in our catalog is carefully curated to meet high standards of performance and longevity, ensuring you can shop with complete peace of mind.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>