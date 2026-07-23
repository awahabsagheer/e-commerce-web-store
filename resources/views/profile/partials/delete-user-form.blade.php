<section class="space-y-6">
    <header>
        <h2 class="text-xl font-extrabold text-[#047857] tracking-tight">
            Delete Account
        </h2>

        <p class="mt-1 text-xs text-slate-700 font-medium">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <!-- Light Shade of Red Button -->
    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="px-6 py-2.5 bg-rose-400/90 hover:bg-rose-500 text-white font-mono text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm">
        Delete Account
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-slate-100 rounded-2xl space-y-4">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-slate-900">
                Are you sure you want to delete your account?
            </h2>

            <p class="text-xs text-slate-600 font-medium">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <div>
                <label class="block font-mono text-xs font-bold text-[#047857] uppercase tracking-wider mb-2">Password</label>
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="Password" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-xs text-rose-600" />
            </div>

            <div class="flex justify-end gap-3 pt-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>

                <button type="submit" class="px-5 py-2 bg-rose-500 hover:bg-rose-600 text-white font-mono text-xs font-bold uppercase tracking-wider rounded-xl transition">
                    Delete Account
                </button>
            </div>
        </form>
    </x-modal>
</section>