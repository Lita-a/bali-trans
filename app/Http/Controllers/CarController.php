<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = Car::query();

        if ($search) {
            $query->where(fn($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%"));
        }

        $cars = $query->latest()->paginate(12)->withQueryString();

        $popularCars = Car::where('is_popular', 1)
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $cart = session('cart', []);

        return view('cars.index', compact('cars', 'popularCars', 'search', 'cart'));
    }

    public function create()
    {
        return view('cars.create', ['car' => null]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Car::class);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        $data['image'] = $imagePath;
        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;

        Car::create($data);

        return redirect()->route('cars.index')
            ->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $this->authorize('update', $car);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) Storage::disk('public')->delete($car->image);
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;

        $car->update($data);

        return redirect()->route('cars.index')
            ->with('success', 'Mobil berhasil diperbarui.');
    }

    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);

        if ($car->image) Storage::disk('public')->delete($car->image);

        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Mobil berhasil dihapus.');
    }
}
