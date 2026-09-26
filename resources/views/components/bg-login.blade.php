@props([
    'text' => 'FOTOGRAFI',
    'color' => '#ffffff',
    'fontSize' => 190,
    'radius' => 1300,
])

@php
    $id = 'arc-' . uniqid();
    $repeatedText = trim(str_repeat($text . '   ', 6));
@endphp

<div {{ $attributes->merge(['class' => 'absolute inset-0 overflow-hidden pointer-events-none select-none z-0']) }}>
    <svg viewBox="0 0 1920 1080" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <path id="{{ $id }}-arc" d="M 10 650 A {{ $radius }} {{ $radius }} 0 0 1 1350 -50" fill="transparent" />
        </defs>

        <g id="{{ $id }}-top">
            <text class="font-condensed" font-weight="600" font-size="{{ $fontSize }}" fill="{{ $color }}" letter-spacing="-10">
                <textPath href="#{{ $id }}-arc" startOffset="0%">
                    {{ $repeatedText }}
                </textPath>
            </text>
        </g>

        {{-- copy bawah-kanan, mirror sempurna dari yang atas --}}
        <use href="#{{ $id }}-top" transform="rotate(180 960 540)" />
    </svg>
</div>