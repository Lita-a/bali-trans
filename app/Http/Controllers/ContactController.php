<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('components.contact');
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Mail::send(new ContactFormMail($validated));

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
