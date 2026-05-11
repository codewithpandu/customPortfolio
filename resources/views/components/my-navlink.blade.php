@props(['href', 'current' => false, 'ariaCurrent' => false])

@php
    if ($current) {
        $classes = ' text-fg-brand';
        $ariaCurrent = 'page';
    } else {
        $classes = ' text-heading';
    }
@endphp

<li>
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "block py-2 px-3 border-b border-light hover:bg-neutral-secondary-soft md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0" . $classes, 'aria-current' => $ariaCurrent]) }}>{{ $slot }}</a>
</li>