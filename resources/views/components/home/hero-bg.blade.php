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
         class="absolute inset-0 w-full h-full object-cover brightness-75"
         loading="eager"
         fetchpriority="high">

    <div class="absolute inset-0 bg-linear-to-b from-black/30 via-black/40 to-black/80"></div>

    <div class="relative z-10 h-full container mx-auto px-6 flex items-end md:items-center
                {{ $align === 'center' ? 'justify-center text-center' : 'justify-start text-left' }}">

        <div class="max-w-2xl pb-8 md:pb-0">

            <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-4">
                {{ $title }}
            </h1>

            @if($subtitle)
                <p class="text-lg md:text-xl text-gray-200 mb-6">
                    {{ $subtitle }}
                </p>
            @endif

            @if($ctaText && $ctaLink)
                <a href="{{ $ctaLink }}"
                   class="inline-block bg-orange-500 hover:bg-orange-600 transition
                          text-white px-8 py-4 rounded-full font-semibold shadow-lg">
                    {{ $ctaText }}
                </a>
            @endif

        </div>
    </div>
    </div>

</div>
