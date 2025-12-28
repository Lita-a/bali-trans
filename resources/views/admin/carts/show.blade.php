<x-admin-layout title="Detail Pemesanan: {{ $order->customer_name }}">
    <div class="container mx-auto p-6 space-y-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">
            Detail Pemesanan: {{ $order->customer_name }}
        </h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg table-auto">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="px-2 py-2 text-center text-sm md:text-base">#</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Nama Penyewa</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Email</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">No Telepon</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Mobil</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Harga/Hari</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Mulai Sewa</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Akhir Sewa</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Durasi</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Dengan Driver</th>
                        <th class="px-2 py-2 text-center text-sm md:text-base">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $index => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-2 py-1 text-center text-sm">{{ $index + 1 }}</td>

                        @if($index === 0)
                            <td class="px-2 py-1 text-center text-sm" rowspan="{{ $order->items->count() }}">
                                {{ $order->customer_name }}
                            </td>
                            <td class="px-2 py-1 text-center text-sm" rowspan="{{ $order->items->count() }}">
                                {{ $order->customer_email ?? '-' }}
                            </td>
                            <td class="px-2 py-1 text-center text-sm" rowspan="{{ $order->items->count() }}">
                                {{ $order->customer_phone ?? '-' }}
                            </td>
                        @endif

                        <td class="px-2 py-1 text-center text-sm">
                            <div class="flex flex-col items-center gap-1">
                                <img src="{{ $item->car_image ?? asset('images/no-car.png') }}" 
                                     alt="{{ $item->car_name }}" class="w-20 h-12 md:w-28 md:h-16 object-cover rounded-lg">
                                <span class="text-xs md:text-sm text-center">{{ $item->car_name }}</span>
                                @if($item->is_popular ?? false)
                                    <span class="bg-yellow-100 text-yellow-800 px-1 py-0.5 text-xs rounded-full mt-1">⭐ Populer</span>
                                @endif
                            </div>
                        </td>

                        <td class="px-2 py-1 text-center text-orange-600 font-semibold text-sm">
                            Rp {{ number_format($item->price) }}
                        </td>
                        <td class="px-2 py-1 text-center text-sm">{{ $item->start_date }}</td>
                        <td class="px-2 py-1 text-center text-sm">{{ $item->end_date }}</td>
                        <td class="px-2 py-1 text-center text-sm">{{ $item->days }} hari</td>
                        <td class="px-2 py-1 text-center text-sm">{{ $item->with_driver ? 'Ya' : 'Tidak' }}</td>
                        <td class="px-2 py-1 text-center text-orange-600 font-semibold text-sm">
                            Rp {{ number_format($item->subtotal) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-end">
            <h2 class="text-lg md:text-xl font-bold text-black">
                Total Pemesanan: <span class="text-orange-600">Rp {{ number_format($order->items->sum('subtotal')) }}</span>
            </h2>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.carts.index') }}" 
               class="btn-black-orange px-4 py-2 rounded-lg text-sm">
               Kembali ke Daftar Pemesanan
            </a>
        </div>
    </div>
</x-admin-layout>
