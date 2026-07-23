<nav x-data="{ open: false }" class="bg-white/40 backdrop-blur-xl border-b border-white/60 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">
            
            <!-- Left: Brand Logo & Navigation Links -->
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="flex items-center gap-2.5 font-extrabold text-xl tracking-tight text-slate-900">
                    <div class="w-9 h-9 rounded-xl bg-[#009ACD] flex items-center justify-center text-white shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l8.66 5v10L12 22l-8.66-5V7L12 2z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-slate-900">TECH<span class="text-[#009ACD]">STORE</span></span>
                </a>

                <!-- Nav Links -->
                <div class="hidden md:flex items-center space-x-1 font-mono text-xs font-bold text-slate-800">
                    <a href="{{ url('/') }}" class="px-4 py-2 rounded-xl transition {{ request()->is('/') ? 'bg-[#059669] text-white shadow-sm' : 'hover:bg-white/50 hover:text-[#047857]' }}">Home</a>
                    <a href="{{ route('products.index') }}" class="px-4 py-2 rounded-xl transition {{ request()->routeIs('products.*') ? 'bg-[#059669] text-white shadow-sm' : 'hover:bg-white/50 hover:text-[#047857]' }}">Shop</a>
                    <a href="{{ url('/about') }}" class="px-4 py-2 rounded-xl transition {{ request()->is('about') ? 'bg-[#059669] text-white shadow-sm' : 'hover:bg-white/50 hover:text-[#047857]' }}">About Us</a>
                    <a href="{{ url('/contact') }}" class="px-4 py-2 rounded-xl transition {{ request()->is('contact') ? 'bg-[#059669] text-white shadow-sm' : 'hover:bg-white/50 hover:text-[#047857]' }}">Contact Us</a>

                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-xl transition text-amber-900 bg-amber-100/80 border border-amber-300/60 hover:bg-amber-200 font-bold ml-2">Dashboard</a>
                            <a href="{{ route('admin.users') }}" class="px-4 py-2 rounded-xl transition text-amber-900 hover:bg-amber-100/50 font-bold">Manage Admins</a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Right: Cart & User Profile Dropdown -->
            <div class="hidden sm:flex items-center space-x-4">
                
                <!-- Shopping Cart Icon Button -->
                <a href="{{ route('cart') }}" class="relative p-2.5 rounded-2xl bg-white/60 hover:bg-white/90 text-slate-800 border border-white/80 shadow-sm transition">
                    <svg class="w-5 h-5 text-slate-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 h-5 w-5 bg-[#059669] text-white font-bold text-[10px] rounded-full flex items-center justify-center shadow-sm">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

                @auth
                    <!-- User Profile Dropdown Pill -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2.5 px-3.5 py-1.5 bg-white/70 hover:bg-white border border-white/80 rounded-full text-xs font-bold text-slate-900 transition shadow-sm">
                                <span class="w-7 h-7 rounded-full bg-[#009ACD] text-white flex items-center justify-center font-bold text-xs shadow-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                                <span class="font-bold text-slate-900">{{ Auth::user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                        </x-slot>

                        <!-- Dropdown Menu Box -->
                        <x-slot name="content">
                            <div class="bg-white/95 backdrop-blur-2xl border border-white/80 rounded-2xl shadow-xl py-1 overflow-hidden">
                                <!-- Order History Link (Visible ONLY to regular customers) -->
                                @if(!Auth::user()->is_admin)
                                    <x-dropdown-link :href="route('orders.my-orders')" class="text-slate-800 hover:text-[#047857] hover:bg-[#a6f2d2]/40 text-xs font-mono font-bold transition-colors">
                                        Order History
                                    </x-dropdown-link>
                                @endif

                                <!-- Profile Link -->
                                <x-dropdown-link :href="route('profile.edit')" class="text-slate-800 hover:text-[#047857] hover:bg-[#a6f2d2]/40 text-xs font-mono font-bold transition-colors">
                                    Profile
                                </x-dropdown-link>

                                <div class="border-t border-slate-200/80 my-1"></div>

                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-rose-600 hover:bg-rose-50 text-xs font-mono font-bold transition-colors">
                                        Log Out
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2.5 bg-[#059669] hover:bg-[#047857] text-white rounded-xl font-mono text-xs font-bold tracking-wider uppercase transition shadow-sm">
                        SIGN IN
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-xl text-slate-700 hover:bg-white/50">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </div>
        </div>
    </div>
</nav>