<x-layout>
    <x-home.hero-bg title="Koleksi Mobil"/>

    @auth
        @if(auth()->user()->isAdmin())
            <div class="container mx-auto p-6 flex justify-end">
                <a href="{{ route('cars.create') }}" class="btn-black-orange">
                    Tambah Mobil
                </a>
            </div>
        @endif
    @endauth
    <div class="container mx-auto p-6">
        <div class="grid-cars">
            @foreach($cars as $car)
                <div class="card-wrapper relative">
                    <div class="card bg-white rounded-xl shadow overflow-hidden">
                        <img
                            src="{{ $car->image_url ?? asset('images/no-car.png') }}"
                            alt="{{ $car->name }}"
                            class="h-48 w-full object-cover object-center"
                        >

                        <div class="card-body p-5 space-y-3">
                            <h2 class="text-xl font-semibold text-gray-900">{{ $car->name }}</h2>
                            <p class="text-sm text-gray-600 line-clamp-2">{{ $car->desc }}</p>

                            @auth
                                <div class="flex justify-between items-center pt-2 space-x-4 mt-4">
                                    @if(auth()->user()->isAdmin())
                                        <span class="text-sm text-gray-900">Jumlah: {{ $car->quantity }}</span>
                                        <a href="{{ route('cars.edit', $car->id) }}" 
                                           class="flex-1 flex items-center justify-center gap-2 btn-black-orange">
                                            Edit
                                        </a>

                                        <div class="border-l h-8"></div>

                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="w-full flex items-center justify-center gap-2 btn-black-orange">
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <a href="https://wa.me/6281234567890?text=Saya%20ingin%20menyewa%20{{ urlencode($car->name) }}" 
                                           target="_blank"
                                           class="flex-1 flex items-center justify-center gap-2
                                                  bg-green-500 hover:bg-green-600
                                                  text-white px-4 py-2 rounded-lg shadow">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20.52 3.48A11.96 11.96 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.12.55 4.12 1.52 5.88L0 24l6.33-1.64A11.96 11.96 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.17-3.48-8.52zm-8.5 17.02c-1.73 0-3.45-.46-4.95-1.33l-.35-.21-3.76.97.99-3.66-.23-.37A9.958 9.958 0 0 1 2 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.18-7.32c-.27-.13-1.59-.78-1.84-.87-.25-.1-.43-.13-.62.13s-.71.87-.87 1.05c-.16.18-.32.2-.59.07-.27-.13-1.13-.42-2.15-1.32-.8-.71-1.34-1.59-1.5-1.86-.16-.27-.02-.41.12-.54.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.34-.03-.47-.08-.13-.62-1.49-.85-2.05-.22-.53-.45-.46-.62-.47l-.53-.01c-.18 0-.47.07-.72.34s-.94.92-.94 2.24c0 1.32.96 2.6 1.09 2.78.13.18 1.88 2.87 4.56 4.02 2.68 1.16 2.68.77 3.17.73.5-.04 1.59-.65 1.81-1.27.22-.62.22-1.15.16-1.27-.05-.12-.18-.18-.36-.31z"/>
                                            </svg>
                                            WhatsApp
                                        </a>

                                        <div class="border-l h-8"></div>

                                        <form action="{{ route('cart.add', $car->id)}}" method="POST" class="flex-1">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $car->id }}">
                                            <x-button type="submit" class="btn btn-orange w-full">Sewa</x-button>
                                        </form>
                                    @endif
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
