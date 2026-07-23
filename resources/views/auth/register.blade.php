<x-app-layout>
    <div class="min-h-[75vh] flex items-center justify-center py-10 px-4">
        <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl space-y-6">
            
            <div class="text-center space-y-1">
                <h2 class="text-2xl font-bold text-white tracking-tight">Create Account</h2>
                <p class="text-xs text-slate-400">Sign up to get started with TechStore</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                           class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 placeholder-slate-600 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition" 
                           placeholder="John Doe">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-rose-400" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                           class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 placeholder-slate-600 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition" 
                           placeholder="user@example.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-400" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Password</label>
                    <input id="password" type="password" name="password" required 
                           class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 placeholder-slate-600 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition" 
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-400" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                           class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 placeholder-slate-600 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition" 
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-rose-400" />
                </div>

                <button type="submit" class="w-full py-3 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-md mt-2">
                    Register
                </button>
            </form>

            <div class="pt-4 border-t border-slate-800/80 text-center text-xs text-slate-400">
                Already registered? 
                <a href="{{ route('login') }}" class="text-cyan-400 hover:underline font-semibold ml-1">
                    Log in here
                </a>
            </div>

        </div>
    </div>
</x-app-layout>