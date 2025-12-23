<x-admin-layout title="Daftar Mobil Admin">
    <div class="container mx-auto p-6 space-y-6">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.cars.create') }}" 
               class="btn-black-orange px-4 py-2 rounded-lg text-sm">
               Tambah Mobil
            </a>
        </div>

        @if($cars->count())
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center">#</th>
                        <th class="px-4 py-2 text-center">Gambar</th>
                        <th class="px-4 py-2 text-center">Nama Mobil</th>
                        <th class="px-4 py-2 text-center">Deskripsi</th>
                        <th class="px-4 py-2 text-center">Jumlah</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $index => $car)
                    <tr class="border-b hover:bg-gray-50 align-top">
                        <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-center">
                            <img src="{{ $car->image_url ?? asset('images/no-car.png') }}" 
                                 alt="{{ $car->name }}" class="w-32 h-20 object-cover mx-auto rounded">
                        </td>
                        <td class="px-4 py-2 text-center text-gray-900">{{ $car->name }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $car->desc }}</td>
                        <td class="px-4 py-2 text-center text-gray-900">{{ $car->quantity }}</td>
                        <td class="px-4 py-2 flex gap-2 justify-center">
                            <a href="{{ route('admin.cars.edit', $car->id) }}" 
                               class="btn-black-orange px-3 py-1 rounded text-sm">
                               Edit
                            </a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn-black-orange px-3 py-1 rounded text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="flex justify-center items-center min-h-75">
            <div class="card p-10 text-center max-w-md bg-white shadow-md rounded-xl">
                <h2 class="text-2xl font-bold text-gray-900 mb-3">
                    Belum ada mobil
                </h2>
                <p class="text-gray-600">
                    Tidak ada data mobil untuk ditampilkan saat ini.
                </p>
            </div>
        </div>
        @endif
    </div>
</x-admin-layout>
