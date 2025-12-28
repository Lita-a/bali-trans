<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
    <div class="text-center mb-6">
        <img src="/images/logo.png" class="h-12 mx-auto mb-3">
        <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
        <p class="text-sm text-gray-500">Bali Trans Rental Mobil</p>
    </div>

    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email"
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-orange-300"
                   required autofocus>
            @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Password</label>
            <input type="password" name="password"
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-orange-300"
                   required>
        </div>

        <button type="submit"
                class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600">
            Login
        </button>
    </form>
</div>

</body>
</html>
