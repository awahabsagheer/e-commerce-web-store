<section>
    <header>
        <h2 class="text-xl font-extrabold text-[#047857] tracking-tight">
            Update Password
        </h2>

        <p class="mt-1 text-xs text-slate-700 font-medium">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <label class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">Current Password</label>
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-xs text-rose-600" />
        </div>

        <div>
            <label class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">New Password</label>
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-xs text-rose-600" />
        </div>

        <div>
            <label class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">Confirm Password</label>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-xs text-rose-600" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-6 py-2.5 bg-[#059669] hover:bg-[#047857] text-white font-mono text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-md">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-xs font-mono font-bold text-[#059669]">
                    Saved.
                </p>
            @endif
        </div>
    </form>
</section>