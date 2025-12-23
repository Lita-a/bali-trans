<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Dashboard Admin' }}</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen">

  <aside class="w-64 bg-white shadow-md p-6 flex flex-col">
    <h2 class="text-2xl font-bold mb-6 text-orange-500">Rental Admin</h2>
    <nav class="flex-1">
      <ul class="space-y-4">
        <li><a href="{{ route('admin.dashboard') }}" class="flex items-center text-gray-700 hover:text-orange-500"><span class="material-icons mr-2">dashboard</span>Dashboard</a></li>
        <li><a href="{{ route('admin.cars.index') }}" class="flex items-center text-gray-700 hover:text-orange-500"><span class="material-icons mr-2">directions_car</span>Daftar Mobil</a></li>
        <li><a href="{{ route('admin.carts.index') }}" class="flex items-center text-gray-700 hover:text-orange-500"><span class="material-icons mr-2">shopping_cart</span>Pesanan</a></li>
        <li><a href="{{ route('admin.testimoni.index') }}" class="flex items-center text-gray-700 hover:text-orange-500"><span class="material-icons mr-2">star</span>Testimoni</a></li>
      </ul>
    </nav>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="mt-auto bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600 w-full">Logout</button>
    </form>
  </aside>

  <main class="flex-1 p-6 overflow-y-auto">
    {{ $slot }}
  </main>

</div>

</body>
</html>
