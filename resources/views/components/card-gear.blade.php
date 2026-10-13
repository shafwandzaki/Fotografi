@props(['gears'])

<div class="reveal-item group overflow-hidden flex flex-col bg-white/3 border border-white/10 rounded-2xl shadow-lg shadow-black/30 backdrop-blur-xs transition duration-300 hover:-translate-y-1 hover:border-white/15 hover:bg-white/5 hover:shadow-white/10">
    <div class="aspect-square w-full overflow-hidden">
        <img src="{{ $gears['foto_gear'] }}" alt="" class="bg-gray-700 h-full w-full object-cover group-hover:scale-105 transition duration-300">
    </div>
    <div class="px-8 py-4">
        <div class="bg-white/20 py-1 px-2 rounded-xl w-fit mb-2">
            <p class="font-jetbrains text-xs">{{ $gears['title'] }}</p>
        </div>
        <p class="font-syne font-bold text-l">{{ $gears['nama_gear'] }}</p>
        <p class="font-inter text-gray-400">{{ $gears['jumlah_gear'] }}x</p>
    </div>
</div>