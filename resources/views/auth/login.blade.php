<x-layout>
    <x-home.hero-bg title="Login" />

    <div class="flex justify-center items-center min-h-[80vh] bg-gray-50">
        <div class="bg-white p-10 rounded-xl shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
                    required
                >

                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <button
                    type="submit"
                    class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition"
                >
                    Login
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-orange-500 font-semibold hover:underline">
                    Daftar
                </a>
            </p>
        </div>
    </div>
</x-layout>
