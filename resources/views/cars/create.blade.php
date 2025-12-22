<x-layout>
    <x-home.hero-bg title="Tambah Mobil"/>

    <div class="container mx-auto p-6 max-w-xl">
        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Nama Mobil</label>
                <input type="text" name="name" value="{{ old('name', '') }}" class="w-full p-3 border rounded" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Harga</label>
                <input type="number" name="price" value="{{ old('price', '') }}" class="w-full p-3 border rounded" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Deskripsi</label>
                <textarea name="desc" rows="3" class="w-full p-3 border rounded">{{ old('desc', '') }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Jumlah Mobil</label>
                <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" class="w-full p-3 border rounded" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Gambar</label>
                <input type="file" name="image" class="w-full p-2 border rounded" id="imageInput" accept="image/*">
            </div>

            <div id="imagePreview" class="mt-4 hidden">
                <div class="card bg-white rounded-xl shadow overflow-hidden w-64">
                    <img id="previewImg" src="https://via.placeholder.com/400x300?text=Preview" alt="Preview" class="h-48 w-full object-cover object-center bg-gray-100">
                    <div class="p-3">
                        <h2 class="text-xl font-semibold text-gray-900">Preview</h2>
                    </div>
                </div>
            </div>
            <x-button type="submit" class="btn-black-orange mt-4">Simpan Mobil</x-button>
        </form>
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
            } else {
                previewImg.src = 'https://via.placeholder.com/400x300?text=Preview';
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-layout>
