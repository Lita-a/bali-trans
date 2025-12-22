@props(['link' => null])

@if ($link)
<a href="{{ $link }}" {{ $attributes }}>
    {{ $slot }}
</a>
@else
<button {{ $attributes }}>
    {{ $slot }}
</button>
@endif
