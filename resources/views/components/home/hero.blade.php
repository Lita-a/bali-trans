<div class="relative w-full overflow-hidden" style="height:75vh;">

    <img src="/images/hero-car.png"
         alt="Toyota Innova Reborn"
         class="absolute inset-0 w-full h-full object-cover brightness-90 scale-105"
         loading="eager"
         fetchpriority="high">

    <div class="absolute inset-0 md:bg-linear-to-b md:from-gray-900/40 md:via-gray-900/30 md:to-gray-900/40
                bg-gray-900/30 sm:bg-gray-900/30"
         style="mix-blend-mode: multiply;"></div>

    <div class="relative z-10 container mx-auto px-4 sm:px-6 md:px-6 h-full flex items-end md:items-center justify-start text-left">

        <div class="max-w-xl sm:max-w-2xl text-white drop-shadow-lg pb-6 md:pb-0">

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-4 drop-shadow-xl">
                Sewa Mobil <span class="text-orange-400">Nyaman</span> & <span class="text-orange-400">Terpercaya</span> di Bali
            </h1>

            <p class="text-base sm:text-lg md:text-xl text-gray-200 drop-shadow-md mb-6">
                Lepas kunci atau dengan driver profesional. Armada bersih, harga transparan.
            </p>

            <div class="flex flex-wrap gap-4 mb-6">
                <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                    ⭐ 4.9 Rating
                </div>
                <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                    🚗 100+ Armada
                </div>
                <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                    👥 1.000+ Customer
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('cars.index') }}"
                   class="bg-linear-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                          transition text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold shadow-2xl text-sm sm:text-base text-center">
                    Lihat Koleksi Mobil
                </a>

                <a href="{{ route('contact') }}"
                   class="border border-white/40 hover:bg-white hover:text-gray-900 transition px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-sm sm:text-base text-center">
                    Konsultasi Cepat
                </a>
            </div>

        </div>
    </div>
</div>
