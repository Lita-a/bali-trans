<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(12);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create', ['car' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|file|image|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);

        $data['image'] = $request->hasFile('image') ? $request->file('image')->store('cars', 'public') : null;
        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;

        Car::create($data);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|file|image|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) Storage::disk('public')->delete($car->image);
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;
        $car->update($data);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function destroy(Car $car)
    {
        if ($car->image) Storage::disk('public')->delete($car->image);
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus.');
    }
}
