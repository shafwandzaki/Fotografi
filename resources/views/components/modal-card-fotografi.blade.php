@props(['foto'])

<div
    x-show="open"
    x-cloak
    x-transition.opacity
    @keydown.escape.window="open = false"
    @click.self="open = false"
    role="dialog"
    aria-modal="true"
    class="fixed inset-0 z-100 flex items-center justify-center bg-black/80 p-4 backdrop-blur-sm"
>
    <div class="flex max-h-[90vh] w-full max-w-6xl flex-col overflow-hidden rounded-2xl bg-[#131315] md:h-[80vh] md:max-h-144 md:flex-row">

        <div class="flex min-h-0 flex-1 items-center justify-center bg-[#0e0e10]">
            <img src="{{ $foto['src'] }}" alt="{{ $foto['title'] }}" class="max-h-[30vh] w-full object-contain md:h-full md:max-h-full">
        </div>

        <div class="relative flex w-full shrink-0 flex-col overflow-y-auto bg-[#1c1c1e] p-6 md:w-96">

            <button
                type="button"
                @click="open = false"
                aria-label="Tutup"
                class="absolute right-4 top-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-white hover:bg-white/20"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" class="h-4 w-4">
                    <path d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>

            <p class="pr-12 font-jetbrains text-[10px] uppercase tracking-widest text-gray-400">{{ $foto['genre'] }}</p>
            <h2 class="mt-1 pr-12 font-syne text-2xl font-bold leading-tight">{{ $foto['title'] }}</h2>

            @if ($foto['deskripsi'])
                <p class="mt-3 font-inter text-xs leading-relaxed text-gray-300">{{ $foto['deskripsi'] }}</p>
            @endif

            @if ($foto['kamera'] || $foto['zoom'] || $foto['aperture'] || $foto['shutter'] || $foto['iso'])
                <div class="mt-5 rounded-lg bg-white/5 p-4">
                    <p class="font-jetbrains text-[10px] uppercase tracking-widest text-gray-500">Spesifikasi</p>
                    <p class="mt-2 font-inter text-sm font-semibold">{{ $foto['kamera'] }}</p>

                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach (array_filter([$foto['zoom'], $foto['aperture'], $foto['shutter'], $foto['iso']]) as $tag)
                            <span class="rounded bg-white/10 px-2 py-1 font-jetbrains text-[10px] font-semibold">[ {{ $tag }} ]</span>
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($foto['lokasi'] || $foto['tanggal'])
                <div class="mt-6 space-y-2">
                    @if ($foto['lokasi'])
                        <div class="flex items-center gap-2 font-inter text-sm">
                            <x-svg-lokasi/>
                            <p class="font-inter text-sm text-gray-400">{{ $foto['lokasi'] }}</p>
                        </div>
                    @endif

                    @if ($foto['tanggal'])
                        <div class="flex items-center gap-2 font-inter text-sm">
                            <x-svg-kalender></x-svg-kalender>
                            <p class="font-inter text-sm text-gray-400">{{ $foto['tanggal'] }}</p>
                        </div>
                    @endif
                </div>
            @endif

            <div class="mt-auto pt-6">
                <a href="{{ $foto['download'] }}" download class="block w-full rounded-lg bg-white/10 py-2.5 text-center font-inter text-sm font-medium text-white hover:bg-white/20">
                    Download gambar
                </a>
            </div>
        </div>
    </div>
</div>