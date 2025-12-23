<x-admin-layout>
    <div class="container mx-auto p-6 space-y-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">Daftar Pemesanan</h1>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->count())
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center">#</th>
                        <th class="px-4 py-2 text-center">Nama Penyewa</th>
                        <th class="px-4 py-2 text-center">Email</th>
                        <th class="px-4 py-2 text-center">No Telepon</th>
                        <th class="px-4 py-2 text-center">Total Harga</th>
                        <th class="px-4 py-2 text-center">Tanggal</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $order->customer_name }}</td>
                        <td class="px-4 py-2">{{ $order->customer_email ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $order->customer_phone ?? '-' }}</td>
                        <td class="px-4 py-2 text-orange-600 font-semibold text-center">
                            Rp {{ number_format($order->total_price) }}
                        </td>
                        <td class="px-4 py-2 text-center">{{ $order->created_at->format('d-m-Y H:i') }}</td>
                        <td class="px-4 py-2 flex gap-2 justify-center">
                            <a href="{{ route('admin.carts.show', $order->id) }}" 
                               class="btn-black-orange px-4 py-1 rounded-lg text-sm flex-1 text-center">
                                Detail
                            </a>
                            <form action="{{ route('admin.carts.destroy', $order->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn-black-orange px-4 py-1 rounded-lg text-sm w-full">
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
                    Belum ada pemesanan
                </h2>
                <p class="text-black">
                    Tidak ada data pemesanan untuk ditampilkan saat ini.
                </p>
            </div>
        </div>
        @endif
    </div>
</x-admin-layout>
