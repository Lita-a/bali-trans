<x-admin-layout title="Edit Mobil Admin">
    <div class="container mx-auto px-6">
        <div class="bg-white shadow rounded-xl p-6 max-w-xl mx-auto">
            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Nama Mobil</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}" class="w-full p-3 border rounded">
                </div>

                <div>
                    <label for="price" class="block mb-1 font-semibold text-gray-700">Harga</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $car->price) }}" class="w-full p-3 border rounded">
                </div>

                <div>
                    <label for="desc" class="block mb-1 font-semibold text-gray-700">Deskripsi</label>
                    <textarea name="desc" id="desc" rows="3" class="w-full p-3 border rounded">{{ old('desc', $car->desc) }}</textarea>
                </div>

                <div>
                    <label for="quantity" class="block mb-1 font-semibold text-gray-700">Jumlah Mobil</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $car->quantity) }}" min="1" class="w-full p-3 border rounded">
                </div>

                <div>
                    <label for="image" class="block mb-1 font-semibold text-gray-700">Gambar</label>
                    <input type="file" name="image" id="imageInput" class="w-full p-2 border rounded" accept="image/*">
                </div>

                <div id="imagePreview" class="mt-4 {{ $car->image_url ? '' : 'hidden' }}">
                    <div class="bg-white rounded-xl shadow overflow-hidden w-64 mx-auto">
                        <img id="previewImg" src="{{ $car->image_url ?? 'https://via.placeholder.com/400x300?text=Preview' }}" 
                             alt="Preview" class="h-48 w-full object-cover object-center bg-gray-100 rounded-t-xl">
                        <div class="p-3 text-center">
                            <h2 class="text-xl font-semibold text-gray-900">Preview</h2>
                        </div>
                    </div>
                </div>

                <x-button type="submit" class="btn-black-orange mt-4 w-full">Update Mobil</x-button>
            </form>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('imageInput');
        const previewContainer = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else if ("{{ $car->image_url }}") {
                previewImg.src = "{{ $car->image_url }}";
            } else {
                previewImg.src = 'https://via.placeholder.com/400x300?text=Preview';
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-admin-layout>
