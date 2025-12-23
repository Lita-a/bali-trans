<x-admin-layout title="Daftar Testimoni Admin">
    <div class="container mx-auto p-6 space-y-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">Daftar Testimoni</h1>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if($testimonis->count())
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center">#</th>
                        <th class="px-4 py-2 text-center">Nama Pengguna</th>
                        <th class="px-4 py-2 text-center">Pesan</th>
                        <th class="px-4 py-2 text-center">Rating</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonis as $index => $testimoni)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-center">{{ $testimoni->user_name }}</td>
                        <td class="px-4 py-2">{{ $testimoni->message }}</td>
                        <td class="px-4 py-2 text-center">
                            @for($i=1;$i<=5;$i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block @if($i <= $testimoni->rating) text-orange-500 @else @endif" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.974c.3.921-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.175 0l-3.38 2.455c-.784.57-1.838-.197-1.539-1.118l1.286-3.974a1 1 0 00-.364-1.118L2.05 9.401c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.974z"/>
                                </svg>
                            @endfor
                        </td>
                        <td class="px-4 py-2 flex justify-center">
                            <form action="{{ route('admin.testimoni.destroy', $testimoni->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-black-orange px-3 py-1 rounded text-sm">
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
                <h2 class="text-2xl font-bold text-black mb-3">
                    Belum ada testimoni
                </h2>
                <p class="text-black">
                    Tidak ada data testimoni untuk ditampilkan saat ini.
                </p>
            </div>
        </div>
        @endif
    </div>
</x-admin-layout>
