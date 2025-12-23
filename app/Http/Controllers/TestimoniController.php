<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->get();
        return view('components.home.testimoni', compact('testimonis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:50',
            'message' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Testimoni::create([
            'user_name' => $request->user_name,
            'message' => $request->message,
            'rating' => $request->rating
        ]);

        return back()->with('success', 'Testimoni berhasil dikirim!');
    }

    public function adminIndex()
    {
        $testimonis = Testimoni::latest()->get();
        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
