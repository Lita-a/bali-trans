<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    private function calculateCart(&$cart)
    {
        $total = 0;

        foreach ($cart as &$item) {
            $item['driver_price'] = $item['driver_price'] ?? ($item['price'] + 200000);
            $item['with_driver'] = $item['with_driver'] ?? 0;
            $item['qty'] = $item['qty'] ?? 1;

            $item['start_date'] = $item['start_date'] ?? now()->format('Y-m-d');
            $item['end_date']   = $item['end_date']   ?? $item['start_date'];

            $start = Carbon::parse($item['start_date']);
            $end   = Carbon::parse($item['end_date']);

            if ($end->lessThan($start)) {
                $end = $start;
                $item['end_date'] = $item['start_date'];
            }

            $days = max(1, $start->diffInDays($end) + 1);

            $pricePerDay = $item['with_driver']
                ? $item['driver_price']
                : $item['price'];

            $item['days'] = $days;
            $item['subtotal'] = $pricePerDay * $item['qty'] * $days;

            $total += $item['subtotal'];
        }

        return $total;
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = $this->calculateCart($cart);
        session(['cart' => $cart]);

        return view('user.carts.index', compact('cart', 'totalPrice'));
    }

    public function add($id)
    {
        $car = Car::findOrFail($id);
        $cart = session()->get('cart', []);

        if (!isset($cart[$car->id])) {
            $cart[$car->id] = [
                'id' => $car->id,
                'name' => $car->name,
                'image' => $car->image
                    ? asset('storage/' . $car->image)
                    : asset('images/no-car.png'),
                'price' => $car->price,
                'driver_price' => $car->price + 200000,
                'qty' => 1,
                'with_driver' => 0,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->format('Y-m-d'),
            ];
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) return back();

        $cart[$id]['start_date'] = $request->start_date;
        $cart[$id]['end_date'] = $request->end_date;
        $cart[$id]['with_driver'] = $request->with_driver ?? 0;

        session(['cart' => $cart]);
        return back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);

        return back();
    }

    public function confirmation(Request $request)
    {
        $cart = session()->get('cart', []);

        if ($request->has('cart')) {
            foreach ($request->cart as $id => $data) {
                if (isset($cart[$id])) {
                    $cart[$id]['start_date']  = $data['start_date'];
                    $cart[$id]['end_date']    = $data['end_date'];
                    $cart[$id]['with_driver'] = $data['with_driver'];
                }
            }
        }

        $totalPrice = $this->calculateCart($cart);
        session(['cart' => $cart]);

        return view('user.carts.confirmation', [
            'cart' => $cart,
            'totalPrice' => $totalPrice
        ]);
    }

    public function storeOrder(Request $request)
    {
        $cart = session()->get('cart', []);
        if (!$cart) return redirect()->route('cart.index');

        if ($request->has('cart')) {
            foreach ($request->cart as $id => $data) {
                if (isset($cart[$id])) {
                    $cart[$id]['start_date']  = $data['start_date'];
                    $cart[$id]['end_date']    = $data['end_date'];
                    $cart[$id]['with_driver'] = $data['with_driver'];
                }
            }
        }

        $totalPrice = $this->calculateCart($cart);

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
        ]);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price' => $totalPrice,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'car_id' => $item['id'],
                'car_name' => $item['name'],
                'car_image' => $item['image'],
                'price' => $item['price'],
                'driver_price' => $item['driver_price'],
                'with_driver' => $item['with_driver'],
                'start_date' => $item['start_date'],
                'end_date' => $item['end_date'],
                'days' => $item['days'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        session()->forget('cart');

        return view('user.carts.confirmation', [
            'totalPrice' => $totalPrice,
            'confirmationCart' => $cart
        ]);
    }
}
