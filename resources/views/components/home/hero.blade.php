<div class="relative w-full h-[75vh] overflow-hidden">

    <img src="/images/hero-car.png"
         alt="Toyota Innova Reborn"
         class="absolute inset-0 w-full h-full object-cover brightness-75"
         loading="eager"
         fetchpriority="high">

    <div class="absolute inset-0 bg-linear-to-b from-black/30 via-black/40 to-black/80"></div>

    <div class="relative z-10 container mx-auto px-6 h-full flex items-center">
        <div class="max-w-xl text-white">

            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-5">
                Sewa Mobil Nyaman & Terpercaya di Bali
            </h1>

            <p class="text-lg md:text-xl text-gray-200 mb-8">
                Lepas kunci atau dengan driver profesional. Armada bersih, harga transparan.
            </p>

            <div class="flex flex-wrap gap-4 mb-8">
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur px-4 py-2 rounded-full text-sm">
                    ⭐ 4.9 Rating
                </div>
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur px-4 py-2 rounded-full text-sm">
                    🚗 100+ Armada
                </div>
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur px-4 py-2 rounded-full text-sm">
                    👥 1.000+ Customer
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('cars.index') }}"
                   class="bg-orange-500 hover:bg-orange-600 transition text-white px-8 py-4 rounded-full font-semibold text-center shadow-lg">
                    Lihat Koleksi Mobil
                </a>

                <a href="{{ route('contact') }}"
                   class="border border-white/60 hover:bg-white hover:text-black transition px-8 py-4 rounded-full font-semibold text-center">
                    Konsultasi Cepat
                </a>
            </div>

        </div>
    </div>
</div>
