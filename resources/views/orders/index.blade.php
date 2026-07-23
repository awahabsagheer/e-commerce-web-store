<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Order History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @foreach($orders as $order)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6">
                    
                    <div class="flex justify-between items-center border-b pb-4 mb-4 border-gray-200 dark:border-gray-700">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Order #{{ $order->id }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $order->created_at->format('d M Y, h:i A') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900 dark:text-white">${{ number_format($order->total_price, 2) }}</p>
                            <span class="px-3 py-1 text-xs rounded-full font-bold
                                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>

                    @foreach($order->items as $item)
                        <div class="flex items-center justify-between py-4 border-b last:border-0 dark:border-gray-700">
                            <div class="flex items-center">
                                @if($item->product && $item->product->image)
                                    <img src="/images/{{ $item->product->image }}" 
                                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;" 
                                         class="mr-4 border border-gray-200 dark:border-gray-600">
                                @else
                                    <div style="width: 80px; height: 80px; border-radius: 8px;" class="bg-gray-300 mr-4 flex items-center justify-center text-gray-500">
                                        No img
                                    </div>
                                @endif
                                
                                <div>
                                    <h4 class="font-bold text-lg text-gray-800 dark:text-gray-200">
                                        {{ $item->product ? $item->product->name : 'Product Removed' }}
                                    </h4>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                </div>
                            </div>
                            <p class="font-semibold text-gray-800 dark:text-gray-200">${{ number_format($item->price, 2) }}</p>
                        </div>
                    @endforeach

                </div>
            @endforeach

            @if($orders->isEmpty())
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <p class="text-gray-500 text-lg mb-4">You haven't placed any orders yet.</p>
                    <a href="{{ route('products.index') }}" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
                        Start Shopping
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>