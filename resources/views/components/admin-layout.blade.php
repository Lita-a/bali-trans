<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

@auth
<div class="flex h-screen">

    <aside class="w-64 bg-white shadow-md p-6 flex flex-col">
        <h2 class="text-2xl font-bold mb-6 text-orange-500">
            Rental Admin
        </h2>

        <nav class="flex-1">
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-2 text-gray-700 hover:text-orange-500">
                        <span class="material-icons">dashboard</span>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.cars.index') }}"
                       class="flex items-center gap-2 text-gray-700 hover:text-orange-500">
                        <span class="material-icons">directions_car</span>
                        Daftar Mobil
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.carts.index') }}"
                       class="flex items-center gap-2 text-gray-700 hover:text-orange-500">
                        <span class="material-icons">shopping_cart</span>
                        Pesanan
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.testimoni.index') }}"
                       class="flex items-center gap-2 text-gray-700 hover:text-orange-500">
                        <span class="material-icons">star</span>
                        Testimoni
                    </a>
                </li>
            </ul>
        </nav>

        <div class="border-t pt-4 mt-4">
            <p class="text-sm text-gray-600 mb-2">
                Login sebagai:
                <span class="font-semibold">{{ auth()->user()->name }}</span>
            </p>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600 w-full">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-6 overflow-y-auto">
        {{ $slot }}
    </main>

</div>
@else
<script>
    window.location.href = "{{ route('admin.login') }}";
</script>
@endauth

</body>
</html>
