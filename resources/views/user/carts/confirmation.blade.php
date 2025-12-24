<x-layout>
    <x-home.hero-bg title="Confirmation" />

    <div class="container mx-auto p-6 flex flex-col items-center justify-center min-h-[60vh]">

        <div class="bg-white rounded-2xl shadow-xl p-10 w-full max-w-lg text-center">
            
            <div class="flex justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h2 class="text-3xl font-bold mb-4 text-gray-800">Pembayaran Berhasil!</h2>

            <p class="text-gray-600 mb-6">
                Terima kasih telah melakukan pembayaran. <br>
                Detail sewa dan metode pembayaran Anda telah tercatat.
            </p>

            @if(isset($totalPrice))
                <div class="bg-gray-100 rounded-lg p-4 mb-6">
                    <p class="text-gray-700 font-semibold">Total Pembayaran:</p>
                    <p class="text-xl font-bold text-orange-500">Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
                </div>
            @endif

            @if(isset($invoicePath))
                <a href="{{ asset($invoicePath) }}" 
                   target="_blank" 
                   class="btn-black-orange inline-block w-full sm:w-auto px-6 py-3 mb-4">
                    Download Invoice
                </a>
            @endif

            <a href="{{ url('/cars') }}" 
               class="btn-black-orange inline-block w-full sm:w-auto px-6 py-3">
                Kembali ke Koleksi Mobil
            </a>
        </div>

    </div>
</x-layout>
