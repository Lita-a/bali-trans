<x-layout>
    <x-home.hero-bg title="Register" />
    <div class="flex justify-center items-center min-h-[80vh]">
        <div class="bg-white p-10 rounded-xl shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Daftar</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}"
                       class="w-full p-3 border rounded-lg">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                       class="w-full p-3 border rounded-lg">
                <input type="password" name="password" placeholder="Password"
                       class="w-full p-3 border rounded-lg">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                       class="w-full p-3 border rounded-lg">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600">Daftar</button>
            </form>

            <p class="mt-4 text-center text-sm">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-orange-500">Login</a>
            </p>
        </div>
    </div>
</x-layout>
