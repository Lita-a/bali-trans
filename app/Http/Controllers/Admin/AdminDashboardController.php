<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Order;
use App\Models\Testimoni;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $todayOrders = Order::whereDate('created_at', now())->count();
        $totalRevenue = Order::sum('total_price');
        $newTestimonials = Testimoni::whereDate('created_at', now())->count();

        return view('admin.dashboard', compact('totalCars', 'todayOrders', 'totalRevenue', 'newTestimonials'));
    }
}
