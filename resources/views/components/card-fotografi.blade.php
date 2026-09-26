@props(['foto'])

<div x-data="{ open: false }">

    {{-- Card --}}
    <article
        role="button"
        tabindex="0"
        aria-label="Lihat detail {{ $foto['title'] }}"
        @click="open = true"
        @keydown.enter.prevent="open = true"
        class="group relative h-70 sm:h-80 md:h-100 w-full cursor-pointer overflow-hidden rounded-xl bg-[#1c1c1e] focus:outline-none focus-visible:ring-2 focus-visible:ring-white/70">
        <img
            src="{{ $foto['src'] }}"
            alt="{{ $foto['title'] }}"
            loading="lazy"
            class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 motion-safe:group-hover:scale-105">

        <div class="absolute inset-0 bg-linear-to-t from-black/95 via-black/30 to-transparent"></div>

        <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-3 p-4">
            <div class="min-w-0">
                <p class="font-jetbrains text-[10px] uppercase tracking-widest text-gray-400">{{ $foto['genre'] }}</p>
                <h3 class="truncate font-syne text-base font-bold">{{ $foto['title'] }}</h3>
                @if ($foto['meta'])
                    <p class="truncate font-jetbrains text-[10px] text-gray-400">{{ $foto['meta'] }}</p>
                @endif
            </div>
            <span class="shrink-0 rounded bg-white px-3 py-1 font-jetbrains text-[10px] font-medium uppercase text-black">
                Lihat →
            </span>
        </div>
    </article>

    <x-modal-card-fotografi :foto="$foto" />

</div>