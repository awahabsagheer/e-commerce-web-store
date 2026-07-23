<x-app-layout>
    <x-slot name="header">
        Manage Admins & Users
    </x-slot>

    <div class="py-12 min-h-screen text-slate-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <!-- Register New Admin Card -->
            <div class="glass-card rounded-3xl p-8 shadow-lg">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-[#047857] tracking-tight">Register New Administrator</h3>
                    <p class="text-slate-600 text-xs mt-1 font-medium">Grant full system management access to a new user account.</p>
                </div>

                <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off" class="space-y-5 max-w-2xl">
                    @csrf

                    <!-- Hidden inputs to catch browser autofill -->
                    <input type="text" class="hidden" aria-hidden="true">
                    <input type="password" class="hidden" aria-hidden="true">

                    <div>
                        <label class="block text-xs font-mono font-bold text-[#047857] uppercase tracking-wider mb-2">Full Name</label>
                        <input type="text" name="name" required autocomplete="off" class="w-full bg-white/60 border border-slate-300/60 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition" placeholder="Admin Name">
                    </div>

                    <div>
                        <label class="block text-xs font-mono font-bold text-[#047857] uppercase tracking-wider mb-2">Email Address</label>
                        <input type="email" name="email" required autocomplete="new-password" class="w-full bg-white/60 border border-slate-300/60 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition" placeholder="admin@example.com">
                    </div>

                    <div>
                        <label class="block text-xs font-mono font-bold text-[#047857] uppercase tracking-wider mb-2">Password</label>
                        <input type="password" name="password" required autocomplete="new-password" class="w-full bg-white/60 border border-slate-300/60 rounded-xl px-4 py-3 text-sm text-slate-800 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition">
                    </div>

                    <button type="submit" class="py-3 px-6 bg-white/80 hover:bg-white text-[#047857] border border-[#059669]/40 rounded-xl text-xs font-mono font-bold uppercase tracking-wider transition-all duration-300 shadow-sm">
                        Create Admin Account
                    </button>
                </form>
            </div>

            <!-- Registered System Users Table -->
            <div class="glass-card rounded-3xl p-8 shadow-lg">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-[#047857] tracking-tight">Registered System Users</h3>
                    <p class="text-slate-600 text-xs mt-1 font-medium">Directory of all customers and administrative users registered on the platform.</p>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-white/70">
                    <table class="w-full text-left text-sm text-slate-800">
                        <thead class="text-xs font-mono font-bold text-[#047857] uppercase tracking-wider bg-white/40 border-b border-white/70">
                            <tr>
                                <th class="py-4 px-6">Name</th>
                                <th class="py-4 px-6">Email Address</th>
                                <th class="py-4 px-6">Role Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-900/10 font-mono text-xs">
                            @foreach($users as $user)
                                <tr class="hover:bg-white/40 transition-colors">
                                    <td class="py-4 px-6 font-semibold text-slate-900">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-slate-700">{{ $user->email }}</td>
                                    <td class="py-4 px-6">
                                        @if($user->is_admin)
                                            <span class="px-3 py-1 bg-[#a6f2d2]/60 text-[#047857] border border-[#a6f2d2] rounded-full text-xs font-bold">Admin</span>
                                        @else
                                            <span class="px-3 py-1 bg-white/50 text-slate-700 border border-slate-300 rounded-full text-xs font-bold">Customer</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>