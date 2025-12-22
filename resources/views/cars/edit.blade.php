<x-layout>
    <x-home.hero-bg title="Edit Mobil"/>

    <div class="container mx-auto p-6">
        <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-semibold">Nama Mobil</label>
                <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}" class="w-full p-3 border rounded-lg">
            </div>

            <div>
                <label for="price" class="block font-semibold">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $car->price) }}" class="w-full p-3 border rounded-lg">
            </div>

            <div>
                <label for="desc" class="block font-semibold">Deskripsi</label>
                <textarea name="desc" id="desc" rows="3" class="w-full p-3 border rounded-lg">{{ old('desc', $car->desc) }}</textarea>
            </div>

            <div>
                <label for="quantity" class="block font-semibold">Jumlah Mobil</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $car->quantity) }}" min="1" class="w-full p-3 border rounded-lg">
            </div>

            <div>
                <label for="image" class="block font-semibold">Gambar</label>
                <input type="file" name="image" id="image" class="w-full p-3 border rounded-lg">
                @if($car->image_url)
                    <img src="{{ $car->image_url }}" class="w-32 h-32 mt-2 object-cover rounded">
                @endif
            </div>

            <x-button type="submit" class="btn-black-orange">Update Mobil</x-button>
        </form>
    </div>
</x-layout>
