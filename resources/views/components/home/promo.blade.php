<section class="py-24 bg-gray-100 overflow-hidden">
    <div class="container mx-auto px-6">

        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-gray-900 mb-3">
                Promo & Keunggulan Kami
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Nikmati kemudahan, fleksibilitas, dan layanan terbaik untuk setiap perjalanan Anda di Bali
            </p>
        </div>

        @php
        $promos = [
            [
                'title' => 'Diskon Khusus Liburan',
                'desc'  => 'Harga spesial untuk periode liburan dan high season.',
                'cta'   => 'Cek Promo',
                'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-orange-500 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 0V4m0 16v-4m8-4h-4M4 12H0"/></svg>'
            ],
            [
                'title' => 'Sewa Harian & Bulanan',
                'desc'  => 'Fleksibel sesuai kebutuhan perjalanan Anda.',
                'cta'   => 'Lihat Mobil',
                'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-orange-500 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
            ],
            [
                'title' => 'Layanan 24/7',
                'desc'  => 'Siap membantu kapan saja selama perjalanan Anda.',
                'cta'   => 'Hubungi Kami',
                'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-orange-500 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
            ],
            [
                'title' => 'Pilihan Mobil Lengkap',
                'desc'  => 'City car, MPV, SUV, hingga mobil premium.',
                'cta'   => 'Lihat Koleksi',
                'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-orange-500 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13l3 3 4-4 5 5 4-4 3 3"/></svg>'
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($promos as $promo)
                <div class="bg-[#E6F7ED] rounded-2xl p-8 text-center">
                    
                    <div class="flex justify-center">
                        {!! $promo['icon'] !!}
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        {{ $promo['title'] }}
                    </h3>

                    <p class="text-gray-700 text-sm mb-6">
                        {{ $promo['desc'] }}
                    </p>

                    <a href="#" class="inline-flex items-center gap-2 text-orange-500 font-semibold">
                        {{ $promo['cta'] }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                </div>
            @endforeach
        </div>

    </div>
</section>
