<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = Car::query();

        if ($search) {
            $query->where(fn($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%"));
        }

        $cars = $query->latest()->paginate(12)->withQueryString();
        $popularCars = Car::where('is_popular', 1)->orderByDesc('id')->take(3)->get();
        $cart = session('cart', []);

        return view('user.cars.index', compact('cars', 'popularCars', 'search', 'cart'));
    }

    public function show(Car $car)
    {
        return view('user.cars.show', compact('car'));
    }
}
