<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        Testimoni::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return back();
    }
}
