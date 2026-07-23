<x-app-layout>
    <x-slot name="header">
        Contact Us
    </x-slot>

    <div class="py-4">
        <!-- Main Transparent Glass Container -->
        <div class="glass-card rounded-3xl p-8 sm:p-12 shadow-lg">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <!-- Info Left -->
                <div class="space-y-6">
                    <div>
                        <div class="font-mono text-xs tracking-widest text-[#059669] font-bold uppercase mb-2">
                            // DIRECT_COMMUNICATION
                        </div>
                        <h2 class="text-3xl font-extrabold text-[#047857] tracking-tight mb-4">Get in Touch</h2>
                        <p class="text-slate-700 text-sm leading-relaxed font-medium">
                            Have a question about our products, orders, or custom configurations? Send us a message and our team will get back to you promptly.
                        </p>
                    </div>

                    <!-- Contact Info Cards -->
                    <div class="space-y-3 pt-4 border-t border-slate-900/10 text-xs font-mono">
                        <div class="flex items-center text-slate-800 bg-white/40 p-4 rounded-xl border border-white/70 shadow-sm">
                            <svg class="w-4 h-4 mr-3 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="font-bold">support@techstore.com</span>
                        </div>
                        <div class="flex items-center text-slate-800 bg-white/40 p-4 rounded-xl border border-white/70 shadow-sm">
                            <svg class="w-4 h-4 mr-3 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="font-bold">Faisalabad, Punjab, Pakistan</span>
                        </div>
                    </div>
                </div>

                <!-- Form Right -->
                <div class="bg-white/40 p-6 sm:p-8 rounded-2xl border border-white/70 shadow-sm">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block font-mono text-[10px] tracking-widest text-[#047857] font-bold uppercase mb-2">Your Name</label>
                            <input type="text" name="name" required class="w-full bg-white/60 border border-slate-300/60 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition" placeholder="John Doe">
                        </div>

                        <div>
                            <label class="block font-mono text-[10px] tracking-widest text-[#047857] font-bold uppercase mb-2">Email Address</label>
                            <input type="email" name="email" required class="w-full bg-white/60 border border-slate-300/60 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition" placeholder="john@example.com">
                        </div>

                        <div>
                            <label class="block font-mono text-[10px] tracking-widest text-[#047857] font-bold uppercase mb-2">Message</label>
                            <textarea name="message" rows="4" required class="w-full bg-white/60 border border-slate-300/60 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition" placeholder="How can we help?"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 bg-[#059669] hover:bg-[#047857] text-white font-mono text-xs font-bold tracking-widest uppercase rounded-xl transition-all shadow-md">
                            Send Message
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>