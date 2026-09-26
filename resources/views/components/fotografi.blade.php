@props(['items', 'genres'])

<section id="fotografi" class="mb-32 min-h-screen px-4 py-16 font-sans text-white" x-data="{ filter: 'all' }">
    <div class="mx-auto mt-14 max-w-6xl">

        <h1 class="mb-10 text-center text-4xl font-bold md:text-5xl">Fotografi</h1>

        <div class="mb-10 flex flex-wrap justify-center gap-2" role="group" aria-label="Filter genre">
            <button
                type="button"
                @click="filter = 'all'"
                :class="filter === 'all' ? 'bg-white text-black' : 'bg-white/10 text-gray-300 hover:bg-white/20'"
                class="rounded px-3 py-1.5 font-jetbrains text-[10px] uppercase tracking-widest transition-colors"
            >
                All
            </button>

            @foreach ($genres as $genre)
                <button
                    type="button"
                    @click="filter = @js($genre)"
                    :class="filter === @js($genre) ? 'bg-white text-black' : 'bg-white/10 text-gray-300 hover:bg-white/20'"
                    class="rounded px-3 py-1.5 font-jetbrains text-[10px] uppercase tracking-widest transition-colors"
                >
                    {{ ucfirst(strtolower($genre)) }}
                </button>
            @endforeach
        </div>

        <div x-cloak class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
            @forelse ($items as $foto)
                <div x-show="filter === 'all' || filter === '{{ $foto['genre'] }}'" x-transition.opacity>
                    <x-card-fotografi :foto="$foto" />
                </div>
            @empty
                <p class="col-span-full text-center font-inter text-sm text-gray-400">Belum ada foto yang ditampilkan.</p>
            @endforelse
        </div>

    </div>
</section>