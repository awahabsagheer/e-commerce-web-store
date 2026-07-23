<x-app-layout>
    <x-slot name="header">
        Profile Settings
    </x-slot>

    <div class="py-4 space-y-8">
        <div class="max-w-7xl mx-auto space-y-8">
            
            <!-- Loyalty Points Card (ONLY Visible to Regular Users) -->
            @if(!Auth::user()->is_admin)
                <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-extrabold text-[#047857] tracking-tight">
                            Loyalty Points
                        </h2>
                        <p class="mt-1 text-xs text-slate-700 font-medium">
                            Your accumulated rewards balance for discounts and special offers.
                        </p>
                    </div>
                    <div class="bg-white/80 border border-slate-300/80 px-6 py-3 rounded-2xl shadow-sm text-center">
                        <span class="block font-mono text-2xl font-black text-[#047857]">
                            {{ Auth::user()->loyalty_points ?? 0 }}
                        </span>
                        <span class="font-mono text-[10px] uppercase tracking-wider font-bold text-slate-500">
                            Points Available
                        </span>
                    </div>
                </div>
            @endif

            <!-- Profile Information Card -->
            <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="bg-slate-200/50 backdrop-blur-2xl border border-slate-300/80 rounded-3xl p-8 shadow-md">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>