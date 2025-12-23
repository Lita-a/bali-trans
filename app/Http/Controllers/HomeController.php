<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        $popularCars = Car::where('is_popular', true)->get();

        if ($popularCars->isEmpty()) {
            $popularCars = Car::limit(4)->get();
        }
        $testimonis = Testimoni::latest()->get();

        return view('components.home', compact('popularCars', 'testimonis'));
    }
}
