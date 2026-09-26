@props(['gears'])

<div class="reveal-item overflow-hidden flex flex-col bg-white/5 border border-white/10 rounded-2xl justify-between">
    <div class="aspect-square w-full overflow-hidden">
        <img src="{{ $gears['foto_gear'] }}" alt="" class="bg-gray-700 h-full w-full object-cover">
    </div>
    {{-- <img src="{{ $gears['foto_gear'] }}" alt="" class="bg-gray-700"> --}}
    <div class="px-8 py-4">
        <div class="bg-white/20 py-1 px-2 rounded-xl w-fit mb-2">
            <p class="font-jetbrains text-xs">{{ $gears['title'] }}</p>
        </div>
        <p class="font-syne font-bold text-l">{{ $gears['nama_gear'] }}</p>
        <p class="font-inter text-gray-400">{{ $gears['jumlah_gear'] }}x</p>
    </div>
</div>