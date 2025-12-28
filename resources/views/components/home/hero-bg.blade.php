@props([
    'title' => 'Judul Hero',
    'subtitle' => null,
    'image' => '/images/hero-car.png',
    'height' => '60vh',
    'align' => 'left',
    'ctaText' => null,
    'ctaLink' => null
])

<div class="relative w-full overflow-hidden" style="height: {{ $height }};">

    <img src="{{ $image }}"
         alt="{{ $title }}"
         class="absolute inset-0 w-full h-full object-cover brightness-90 scale-105 animate-pulse-slow"
         loading="eager"
         fetchpriority="high">

    <div class="absolute inset-0"
         style="background: linear-gradient(135deg, rgba(0,0,0,0.5) 0%, rgba(31,41,55,0.3) 50%, rgba(0,0,0,0.6) 100%);
                mix-blend-mode: multiply;">
    </div>

    <div class="relative z-10 h-full container mx-auto px-6 flex items-end md:items-center
                {{ $align === 'center' ? 'justify-center text-center' : 'justify-start text-left' }}">

        <div class="max-w-2xl pb-8 md:pb-0">

            <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-4 drop-shadow-xl">
                {!! preg_replace('/(Nyaman|Terpercaya)/', '<span class="text-orange-400">$1</span>', $title) !!}
            </h1>

            @if($subtitle)
                <p class="text-lg md:text-xl text-gray-200 drop-shadow-md mb-6">
                    {{ $subtitle }}
                </p>
            @endif

            @if($ctaText && $ctaLink)
                <a href="{{ $ctaLink }}"
                   class="inline-block bg-linear-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                          transition text-white px-8 py-4 rounded-full font-semibold shadow-2xl">
                    {{ $ctaText }}
                </a>
            @endif

        </div>
    </div>

</div>

<style>
@keyframes pulse-slow {
    0%, 100% { transform: scale(1.05); }
    50% { transform: scale(1.03); }
}
.animate-pulse-slow {
    animation: pulse-slow 15s infinite ease-in-out;
}
</style>
