<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 dark:text-red-200 leading-tight">
            {{ __('SeaFooderia') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 dark:bg-blue-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-2xl font-bold">Welcome to the SeaFooderia</h1>
                    <p class="mt-4 text-gray-700 dark:text-gray-300">
                        Indulge in the world of delicious sea dishes!
                    </p>
                </div>
            </div>
            
            <!-- Sea Dishes Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <!-- Dish 1 -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <img src="{{ asset('images/grilled.jpg') }}" alt="Grilled Salmon" class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Grilled Salmon</h3>
                        <p class="text-gray-600 dark:text-gray-400">A classic delicacy grilled to perfection.</p>
                    </div>
                </div>

                <!-- Dish 2 -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <img src="{{ asset('images/seafoodplatter.jpg') }}" alt="Seafood Platter" class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Seafood Platter</h3>
                        <p class="text-gray-600 dark:text-gray-400">A mix of the ocean's finest treasures.</p>
                    </div>
                </div>

                <!-- Dish 3 -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <img src="{{ asset('images/shrimpcock.jpg') }}" alt="Shrimp Cocktail" class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Shrimp Cocktail</h3>
                        <p class="text-gray-600 dark:text-gray-400">A refreshing starter with a zesty twist.</p>
                    </div>
                </div>

                <!-- Dish 4 -->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <img src="{{ asset('images/lobster.jpg') }}" alt="Lobster Thermidor" class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Lobster Thermidor</h3>
                        <p class="text-gray-600 dark:text-gray-400">A luxurious lobster dish with a creamy sauce and cheesy crust.</p>
                    </div>
                </div>    

                <!-- Dish 5-->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <img src="{{ asset('images/garlicshirmp.jpg') }}" alt="Garlic Butter Shrimp" class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Garlic Butter Shrimp</h3>
                        <p class="text-gray-600 dark:text-gray-400">Juicy shrimp in a savory garlic butter sauce, perfect with bread or rice.</p>
                    </div>
                </div> 
                
                <!-- Dish 6-->
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <img src="{{ asset('images/crabcakes.jpg') }}" alt="Crab Cakes" class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Crab Cakes</h3>
                        <p class="text-gray-600 dark:text-gray-400">Crispy crab cakes with fresh herbs and a zesty dipping sauce.</p>
                    </div>
                </div>
            </div>

            <!-- Order Button -->
            <div class="text-center mt-8">
                <a href="{{ route('order.page') }}" 
                   class="font-bold py-2 px-4 rounded"
                   style="background-color: black; color: white; display: inline-block;">
                    Order Now!
                </a>
            </div>

            <!-- Order History Section -->
            <div class="mt-16 bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Order History</h2>
                @if($userOrders->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400 mt-4">You have no orders yet.</p>
                @else
                    <ul class="mt-4">
                        @foreach ($userOrders as $order)
                            <li class="border-b pb-4 mb-4">
                                <h3 class="font-semibold text-gray-800 dark:text-gray-300">
                                    Order #{{ $order->id }} ({{ $order->created_at->format('d M Y, h:i A') }})
                                </h3>
                                <ul class="ml-4 mt-2">
                                    @foreach ($order->items as $item)
                                        <li>
                                            {{ $item->dish->name }} - {{ $item->quantity }} x ${{ number_format($item->dish->price, 2) }}
                                        </li>
                                    @endforeach
                                </ul>
                                <p class="font-bold mt-2 text-gray-700 dark:text-gray-400">
                                    Total: ${{ number_format($order->total, 2) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
