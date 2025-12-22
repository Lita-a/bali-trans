<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BaliTrans' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900">

<nav id="navbar"
     class="fixed top-0 left-0 w-full z-50 bg-white/90 backdrop-blur border-b border-gray-200 shadow-sm transition-all duration-300">

    <div id="nav-inner"
         class="flex justify-between items-center h-20 px-4 md:px-10 transition-all duration-300">

        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <img src="/images/logo.png" alt="BaliTrans Logo" class="h-10">
        </a>

        <div class="hidden md:flex items-center space-x-8">

            <a href="{{ route('cars.index') }}"
               class="{{ request()->routeIs('cars.*') ? 'text-orange-500 font-semibold border-b-2 border-orange-500 pb-1' : 'text-black hover:text-orange-500 transition' }}">
                Daftar Mobil
            </a>

            <a href="{{ route('contact') }}"
               class="{{ request()->routeIs('contact') ? 'text-orange-500 font-semibold border-b-2 border-orange-500 pb-1' : 'text-black hover:text-orange-500 transition' }}">
                Contact Us
            </a>

            <a href="{{ route('cart.index') }}"
               class="relative {{ request()->routeIs('cart.*') ? 'text-orange-500 font-semibold border-b-2 border-orange-500 pb-1' : 'text-black hover:text-orange-500 transition' }}">
                My Cart
                @if(session('cart') && count(session('cart')) > 0)
                    <span class="absolute -top-2 -right-3 bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>

            @auth
                <div class="relative">

                    <button id="user-toggle" type="button"
                            class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-9 h-9 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <svg id="user-arrow"
                             class="w-4 h-4 text-gray-600 transition-transform duration-300"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div id="user-dropdown"
                         class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg hidden opacity-0 scale-95 transition origin-top-right">

                        <div class="px-4 py-3 border-b">
                            <p class="text-sm font-semibold text-gray-800">
                                {{ auth()->user()->name }}
                            </p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-3 text-red-500 text-sm hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-black hover:text-orange-500 font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}" class="text-black hover:text-orange-500 font-medium">
                    Register
                </a>
            @endauth
        </div>

        <button id="mobile-menu-button" class="md:hidden text-black focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <div id="mobile-menu"
         class="md:hidden hidden bg-white border-t shadow-md transform transition-all duration-300 ease-in-out opacity-0 translate-y-2">

        <a href="{{ route('cars.index') }}" class="block px-6 py-4 hover:bg-gray-100">
            Daftar Mobil
        </a>

        <a href="{{ route('contact') }}" class="block px-6 py-4 hover:bg-gray-100">
            Contact Us
        </a>

        <a href="{{ route('cart.index') }}" class="block px-6 py-4 font-semibold text-orange-500">
            My Cart
        </a>

        @auth
            <div class="px-6 py-4 border-t">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-9 h-9 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <span class="font-medium text-gray-800">
                        {{ auth()->user()->name }}
                    </span>
                </div>

                <a href="#" class="block py-2 text-sm">
                    My Orders
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-500 text-sm mt-2">
                        Logout
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}" class="block px-6 py-4 hover:bg-gray-100">
                Login
            </a>
            <a href="{{ route('register') }}" class="block px-6 py-4 hover:bg-gray-100">
                Register
            </a>
        @endauth
    </div>
</nav>

<main class="pt-24">
    {{ $slot }}
</main>

@if(session('cart') && count(session('cart')) > 0)
<a href="{{ route('cart.index') }}"
   class="fixed bottom-4 left-4 right-4 md:hidden bg-orange-500 text-white py-4 rounded-full
          shadow-lg text-center font-semibold z-40">
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
    setTimeout(() => {
        menu.classList.toggle('opacity-0')
        menu.classList.toggle('translate-y-2')
    }, 10)
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

const userToggle = document.getElementById('user-toggle')
const userDropdown = document.getElementById('user-dropdown')
const userArrow = document.getElementById('user-arrow')

if (userToggle) {
    userToggle.addEventListener('click', (e) => {
        e.stopPropagation()
        userDropdown.classList.toggle('hidden')
        setTimeout(() => {
            userDropdown.classList.toggle('opacity-0')
            userDropdown.classList.toggle('scale-95')
        }, 10)
        userArrow.classList.toggle('rotate-180')
    })

    document.addEventListener('click', () => {
        if (!userDropdown.classList.contains('hidden')) {
            userDropdown.classList.add('hidden', 'opacity-0', 'scale-95')
            userArrow.classList.remove('rotate-180')
        }
    })
}
</script>

</body>
</html>
