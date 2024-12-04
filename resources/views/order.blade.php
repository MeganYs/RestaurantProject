<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h1 class="text-2xl mb-4">Order Dishes</h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($dishes as $dish)
                        <div class="p-4 border rounded shadow">
                            <img src="{{ asset('images/' . $dish->image) }}" alt="{{ $dish->name }}" class="w-full h-32 object-cover rounded">
                            <h3 class="text-lg font-bold mt-2">{{ $dish->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $dish->description }}</p>
                            <p class="text-lg font-bold text-blue-500 mt-2">${{ number_format($dish->price, 2) }}</p>
                            <form action="{{ route('order.add') }}" method="POST" class="mt-4">
                                @csrf
                                <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                <input type="number" name="quantity" value="1" min="1" class="border rounded w-full">
                                <button type="submit" class="bg-black text-white px-4 py-2 rounded mt-2">Add to Order</button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <h2 class="text-xl mt-6">Current Order</h2>
                <ul>
                    @foreach ($order as $dishId => $quantity)
                        <li class="mt-2">
                            {{ $dishes->find($dishId)->name }} - {{ $quantity }}
                            <form action="{{ route('order.remove') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="dish_id" value="{{ $dishId }}">
                                <button type="submit" class="text-red-500">Remove</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <form action="{{ route('order.confirm') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
