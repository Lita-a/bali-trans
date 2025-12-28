<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BaliTrans' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900">

<nav id="navbar"
     class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-200">

    <div id="nav-inner"
         class="flex justify-between items-center h-20 px-4 md:px-10">

        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <img src="/images/logo.png" alt="BaliTrans Logo" class="h-10">
        </a>

        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('cars.index') }}"
               class="{{ request()->routeIs('cars.*') ? 'text-orange-500 font-semibold border-b-2 border-orange-500 pb-1' : 'text-gray-700' }}">
                Daftar Mobil
            </a>
            <a href="{{ route('contact') }}"
               class="{{ request()->routeIs('contact') ? 'text-orange-500 font-semibold border-b-2 border-orange-500 pb-1' : 'text-gray-700' }}">
                Contact Us
            </a>
            <a href="{{ route('cart.index') }}"
               class="relative {{ request()->routeIs('cart.*') ? 'text-orange-500 font-semibold border-b-2 border-orange-500 pb-1' : 'text-gray-700' }}">
                My Cart
                @if(session('cart') && count(session('cart')) > 0)
                    <span class="absolute -top-2 -right-3 bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </div>

        <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="md:hidden hidden bg-white border-t rounded-t-xl">
        <a href="{{ route('cars.index') }}" class="block px-6 py-4">Daftar Mobil</a>
        <a href="{{ route('contact') }}" class="block px-6 py-4">Contact Us</a>
        <a href="{{ route('cart.index') }}" class="block px-6 py-4 font-semibold text-orange-500">
            My Cart
            @if(session('cart') && count(session('cart')) > 0)
                ({{ count(session('cart')) }})
            @endif
        </a>
    </div>
</nav>

<main class="pt-24 md:pt-28">
    {{ $slot }}
</main>

@if(session('cart') && count(session('cart')) > 0)
<a href="{{ route('cart.index') }}"
   class="fixed bottom-4 left-4 right-4 md:hidden bg-orange-500 text-white py-4 rounded-xl
          text-center font-semibold z-40">
    My Cart ({{ count(session('cart')) }})
</a>
@endif

<script>
const btn = document.getElementById('mobile-menu-button')
const menu = document.getElementById('mobile-menu')
const navbar = document.getElementById('navbar')
const navInner = document.getElementById('nav-inner')

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden')
})

window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
        navInner.classList.remove('h-20')
        navInner.classList.add('h-16')
        navbar.classList.add('shadow-md')
    } else {
        navInner.classList.add('h-20')
        navInner.classList.remove('h-16')
        navbar.classList.remove('shadow-md')
    }
})
</script>

</body>
</html>
