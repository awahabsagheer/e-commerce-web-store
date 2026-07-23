<section>
    <header>
        <h2 class="text-xl font-extrabold text-[#047857] tracking-tight">
            Profile Information
        </h2>

        <p class="mt-1 text-xs text-slate-700 font-medium">
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <div>
            <label class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">Name</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-xs text-rose-600" :messages="$errors->get('name')" />
        </div>

        <div>
            <label class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">Email</label>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-xs text-rose-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-xs mt-2 text-slate-800 font-medium">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-xs text-[#059669] hover:text-[#047857] font-bold">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-mono text-xs font-bold text-[#059669]">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-6 py-2.5 bg-[#059669] hover:bg-[#047857] text-white font-mono text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-md">
                Save
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-xs font-mono font-bold text-[#059669]">
                    Saved.
                </p>
            @endif
        </div>
    </form>
</section>