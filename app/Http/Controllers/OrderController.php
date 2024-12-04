<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();

        $order = session('order', []);
        
        return view('order', compact('dishes', 'order'));
    }

    public function addDish(Request $request)
    {
        $dishId = $request->input('dish_id');
        $quantity = $request->input('quantity', 1);

        $order = session('order', []);
        $order[$dishId] = $quantity;

        session(['order' => $order]);

        return back()->with('success', 'Dish added to order.');
    }

    public function removeDish(Request $request)
    {
        $dishId = $request->input('dish_id');

        $order = session('order', []);
        unset($order[$dishId]);

        session(['order' => $order]);

        return back()->with('success', 'Dish removed from order.');
    }

    public function confirmOrder(Request $request)
    {
        $orderData = session('order', []);
        $user = auth()->user();

        $order = Order::create(['user_id' => $user->id]);
        foreach ($orderData as $dishId => $quantity) {
            OrderItem::create([
                'order_id' => $order->id,
                'dish_id' => $dishId,
                'quantity' => $quantity
            ]);
        }

        session()->forget('order');

        return redirect()->route('dashboard')->with('success', 'Order confirmed!');
    }
}
