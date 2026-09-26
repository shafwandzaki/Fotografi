{{--
    Partial form, dipakai oleh create.blade.php dan edit.blade.php.
    Variabel yang dibutuhkan: $genres (array), $foto (opsional, ada isinya kalau mode edit).
--}}
@php
    $foto = $foto ?? null;
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

    {{-- Upload foto --}}
    <div class="md:col-span-2">
        <label for="foto" class="mb-1 block font-inter text-sm text-gray-300">
            Foto {{ $foto ? '(kosongkan kalau tidak ingin mengganti)' : '' }}
        </label>

        @if ($foto?->foto)
            <div class="mb-3 flex h-60 w-80 items-center justify-center overflow-hidden rounded-lg bg-white/5">
                <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $foto->nama_foto }}" class="h-full w-full object-contain">
            </div>
        @endif

        <input
            id="foto"
            type="file"
            name="foto"
            accept="image/*"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-white/10 file:px-3 file:py-1.5 file:text-white"
        >
    </div>

    {{-- Genre --}}
    <div>
        <label for="genre" class="mb-1 block font-inter text-sm text-gray-300">Genre</label>
        <select id="genre" name="genre" class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white">
            @foreach ($genres as $genre)
                <option value="{{ $genre }}" @selected(old('genre', $foto->genre ?? '') === $genre)>
                    {{ ucfirst(strtolower($genre)) }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Nama foto --}}
    <div>
        <label for="nama_foto" class="mb-1 block font-inter text-sm text-gray-300">Nama foto</label>
        <input
            id="nama_foto"
            type="text"
            name="nama_foto"
            value="{{ old('nama_foto', $foto->nama_foto ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    {{-- Deskripsi --}}
    <div class="md:col-span-2">
        <label for="deskripsi" class="mb-1 block font-inter text-sm text-gray-300">Deskripsi</label>
        <textarea
            id="deskripsi"
            name="deskripsi"
            rows="3"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >{{ old('deskripsi', $foto->deskripsi ?? '') }}</textarea>
    </div>

    {{-- Lokasi --}}
    <div>
        <label for="lokasi" class="mb-1 block font-inter text-sm text-gray-300">Lokasi</label>
        <input
            id="lokasi"
            type="text"
            name="lokasi"
            value="{{ old('lokasi', $foto->lokasi ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    {{-- Tanggal --}}
    <div>
        <label for="tanggal" class="mb-1 block font-inter text-sm text-gray-300">Tanggal</label>
        <input
            id="tanggal"
            type="date"
            name="tanggal"
            value="{{ old('tanggal', optional($foto?->tanggal)->format('Y-m-d')) }}"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    {{-- Kamera --}}
    <div>
        <label for="kamera" class="mb-1 block font-inter text-sm text-gray-300">Kamera</label>
        <input
            id="kamera"
            type="text"
            name="kamera"
            value="{{ old('kamera', $foto->kamera ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    {{-- Zoom --}}
    <div>
        <label for="zoom" class="mb-1 block font-inter text-sm text-gray-300">Zoom (mm)</label>
        <input
            id="zoom"
            type="number"
            name="zoom"
            value="{{ old('zoom', $foto->zoom ?? '') }}"
            placeholder="35"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    {{-- Aperture --}}
    <div>
        <label for="aperture" class="mb-1 block font-inter text-sm text-gray-300">Aperture (f/)</label>
        <input
            id="aperture"
            type="number"
            step="0.1"
            name="aperture"
            value="{{ old('aperture', $foto->aperture ?? '') }}"
            placeholder="2.8"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    {{-- Shutter speed --}}
    <div>
        <label for="shuterspeed" class="mb-1 block font-inter text-sm text-gray-300">Shutter speed</label>
        <input
            id="shuterspeed"
            type="text"
            name="shuterspeed"
            value="{{ old('shuterspeed', $foto->shuterspeed ?? '') }}"
            placeholder="1/500"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    {{-- ISO --}}
    <div>
        <label for="iso" class="mb-1 block font-inter text-sm text-gray-300">ISO</label>
        <input
            id="iso"
            type="number"
            name="iso"
            value="{{ old('iso', $foto->iso ?? '') }}"
            placeholder="100"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>
</div>

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="rounded-lg bg-white px-6 py-2.5 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
        Simpan
    </button>
    <a href="{{ route('admin.fotografi.index') }}" class="rounded-lg border border-white/10 px-6 py-2.5 font-inter text-sm text-gray-300 transition-colors hover:bg-white/5">
        Batal
    </a>
</div>