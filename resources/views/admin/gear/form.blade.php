@php
    $gear = $gear ?? null;
@endphp

@if ($errors->any())
    <div class="mb-6 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 font-inter text-sm text-red-300">
        <p class="mb-1 font-semibold">Periksa kembali isian berikut:</p>
        <ul class="list-inside list-disc space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-6 md:grid-cols-2">

    <div class="md:col-span-2">
        <label for="foto_gear" class="mb-1 block font-inter text-sm text-gray-300">
            Foto {{ $gear ? '(kosongkan kalau tidak ingin mengganti)' : '' }}
        </label>

        @if ($gear?->foto_gear)
            <img src="{{ asset('storage/' . $gear->foto_gear) }}" alt="{{ $gear->nama_gear }}" class="mb-3 h-60 w-60 rounded-lg object-cover">
        @endif

        <input
            id="foto_gear"
            type="file"
            name="foto_gear"
            accept="image/*"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-white/10 file:px-3 file:py-1.5 file:text-white"
        >
    </div>

    <div>
        <label for="title" class="mb-1 block font-inter text-sm text-gray-300">Kategori</label>
        <input
            id="title"
            type="text"
            name="title"
            value="{{ old('title', $gear->title ?? '') }}"
            placeholder="Kamera, Lensa, SD Card, dll"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    <div>
        <label for="nama_gear" class="mb-1 block font-inter text-sm text-gray-300">Nama gear</label>
        <input
            id="nama_gear"
            type="text"
            name="nama_gear"
            value="{{ old('nama_gear', $gear->nama_gear ?? '') }}"
            placeholder="Sony A6400"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    <div>
        <label for="jumlah_gear" class="mb-1 block font-inter text-sm text-gray-300">Jumlah</label>
        <input
            id="jumlah_gear"
            type="number"
            name="jumlah_gear"
            min="1"
            value="{{ old('jumlah_gear', $gear->jumlah_gear ?? 1) }}"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>
</div>

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="rounded-lg bg-white px-6 py-2.5 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
        Simpan
    </button>
    <a href="{{ route('admin.gear.index') }}" class="rounded-lg border border-white/10 px-6 py-2.5 font-inter text-sm text-gray-300 transition-colors hover:bg-white/5">
        Batal
    </a>
</div>