<section class="py-20 bg-linear-to-b from-gray-100 via-gray-50 to-gray-100">
    <div class="container mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">
            Mobil Pilihan
        </h2>

        @if(isset($popularCars) && $popularCars->isNotEmpty())
        <div class="grid-cars">

            @foreach($popularCars as $car)
            <div class="card-wrapper relative">
                <div class="card bg-white rounded-xl shadow overflow-hidden">

                    <img
                        src="{{ $car->image ? asset('storage/' . $car->image) : asset('images/no-car.png') }}"
                        alt="{{ $car->name }}"
                        class="h-48 w-full object-cover object-center"
                    >

                    <div class="card-body p-5 space-y-3">
                        <h2 class="text-xl font-semibold text-gray-900">
                            {{ $car->name }}
                        </h2>

                        <p class="text-sm text-gray-600 line-clamp-2">
                            {{ $car->desc }}
                        </p>

                        <div class="flex justify-between items-center pt-2 space-x-4 mt-4">

                            <a href="https://wa.me/6281234567890?text=Saya%20ingin%20menyewa%20{{ urlencode($car->name) }}"
                               target="_blank"
                               class="flex-1 flex items-center justify-center gap-2
                                      bg-green-500 hover:bg-green-600
                                      text-white px-4 py-2 rounded-lg shadow">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.52 3.48A11.96 11.96 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.12.55 4.12 1.52 5.88L0 24l6.33-1.64A11.96 11.96 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.17-3.48-8.52z"/>
                                </svg>

                                WhatsApp
                            </a>

                            <div class="border-l h-8"></div>

                            <form action="{{ route('cart.add', $car->id) }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="id" value="{{ $car->id }}">
                                <x-button type="submit" class="btn btn-orange w-full">
                                    Sewa
                                </x-button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
        @endif

    </div>
</section>
