<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard - Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- METRICS SUMMARY CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 border-l-4 border-blue-500">
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Total Orders</p>
                    <p class="text-3xl font-extrabold mt-2">{{ $totalOrders }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 border-l-4 border-green-500">
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Completed Revenue</p>
                    <p class="text-3xl font-extrabold mt-2">${{ number_format($totalRevenue, 2) }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 border-l-4 border-purple-500">
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Total Users</p>
                    <p class="text-3xl font-extrabold mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 border-l-4 border-yellow-500">
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Active Products</p>
                    <p class="text-3xl font-extrabold mt-2">{{ $totalProducts }}</p>
                </div>
            </div>

            <!-- CUSTOMER ORDERS TABLE SECTION -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Customer Orders</h3>

                @if($orders->isEmpty())
                    <!-- EMPTY STATE -->
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-200">No orders placed yet</h3>
                        <p class="mt-1 text-sm text-gray-400">Customer orders will appear here as soon as checkouts are completed.</p>
                    </div>
                @else
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                                <th class="py-3 px-6">Order ID</th>
                                <th class="py-3 px-6">Customer Name</th>
                                <th class="py-3 px-6">Total Price</th>
                                <th class="py-3 px-6">Status</th>
                                <th class="py-3 px-6">Date</th>
                                <th class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 dark:text-gray-300 text-sm font-light">
                            @foreach($orders as $order)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="py-3 px-6 font-bold">#{{ $order->id }}</td>
                                    <td class="py-3 px-6">
                                        {{ $order->name }}<br>
                                        <span class="text-xs text-gray-400">{{ $order->email }}</span>
                                    </td>
                                    <td class="py-3 px-6">${{ number_format($order->total_price, 2) }}</td>
                                    <td class="py-3 px-6">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold
                                            {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                               ($order->status == 'shipped' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">{{ $order->created_at->format('d M Y') }}</td>
                                    <td class="py-3 px-6">
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="py-1 px-2 border rounded text-sm mr-2 dark:bg-gray-700 dark:text-white border-gray-300 dark:border-gray-600">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                            <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded text-xs hover:bg-blue-600 transition">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>