<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Tampilkan halaman contact (opsional, kalau sudah ada blade)
     */
    public function index()
    {
        return view('components.contact');
    }

    /**
     * Handle form submit
     */
    public function sendMessage(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Bisa kirim email atau simpan ke database
        // Contoh kirim email ke admin:
        /*
        Mail::send([], [], function ($mail) use ($validated) {
            $mail->to('info@balitrans.com')
                 ->subject('Pesan Baru dari Contact Form')
                 ->setBody(
                     "Nama: {$validated['name']}\n" .
                     "Email: {$validated['email']}\n" .
                     "Pesan: {$validated['message']}",
                     'text/plain'
                 );
        });
        */

        // Redirect balik ke halaman contact dengan flash message sukses
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
