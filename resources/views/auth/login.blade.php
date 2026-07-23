<x-app-layout>
    <div class="min-h-[70vh] flex items-center justify-center py-8 px-4">
        <div class="w-full max-w-md bg-white rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_-5px_rgba(0,0,0,0.05)] space-y-6">
            
            <div class="text-center space-y-1">
                <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Welcome back</h2>
                <p class="text-xs text-slate-400">Please enter your credentials to log in</p>
            </div>

            <x-auth-session-status class="mb-4 text-xs font-semibold text-emerald-600" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:border-emerald-400 focus:ring-2 focus:ring-[#a6f2d2] transition" 
                           placeholder="user@example.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-rose-500 font-medium" />
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Password</label>
                    <input id="password" type="password" name="password" required 
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:border-emerald-400 focus:ring-2 focus:ring-[#a6f2d2] transition" 
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-rose-500 font-medium" />
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label for="remember_me" class="inline-flex items-center text-slate-600 font-medium cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 text-emerald-500 focus:ring-[#a6f2d2]">
                        <span class="ms-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-emerald-600 font-semibold hover:underline" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="w-full py-3.5 bg-[#a6f2d2] hover:bg-[#52d3a3] text-slate-900 font-extrabold text-xs tracking-wider uppercase rounded-xl transition shadow-sm">
                    Log In
                </button>
            </form>

            @if (Route::has('register'))
                <div class="pt-4 border-t border-slate-100 text-center text-xs text-slate-500">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-emerald-600 font-bold hover:underline ml-1">Register here</a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>