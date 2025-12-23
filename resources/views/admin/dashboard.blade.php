<x-admin-layout title="Dashboard Admin">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Mobil</p>
                <h2 class="text-2xl font-bold">{{ $totalCars }}</h2>
            </div>
            <div class="bg-orange-100 p-3 rounded-full">
                <span class="material-icons text-orange-500">directions_car</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-gray-500">Pesanan Hari Ini</p>
                <h2 class="text-2xl font-bold">{{ $todayOrders }}</h2>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <span class="material-icons text-green-500">shopping_cart</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-gray-500">Pendapatan</p>
                <h2 class="text-2xl font-bold">Rp {{ number_format($totalRevenue) }}</h2>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <span class="material-icons text-blue-500">attach_money</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-gray-500">Testimoni Baru</p>
                <h2 class="text-2xl font-bold">{{ $newTestimonials }}</h2>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <span class="material-icons text-purple-500">star</span>
            </div>
        </div>
    </div>

</x-admin-layout>
