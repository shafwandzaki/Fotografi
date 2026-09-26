@php
    $karya = $karya ?? null;
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
        <label for="img_karya" class="mb-1 block font-inter text-sm text-gray-300">
            Gambar {{ $karya ? '(kosongkan kalau tidak ingin mengganti)' : '' }}
        </label>

        @if ($karya?->img_karya)
        <div class="mb-3 flex h-60 w-80 items-center justify-center overflow-hidden rounded-lg bg-white/5">
            <img src="{{ asset('storage/' . $karya->img_karya) }}" alt="{{ $karya->nama_karya }}" class="h-full w-full object-contain">
        </div>
        @endif

        <input
            id="img_karya"
            type="file"
            name="img_karya"
            accept="image/*"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-white/10 file:px-3 file:py-1.5 file:text-white"
        >
    </div>

    <div class="md:col-span-2">
        <label for="nama_karya" class="mb-1 block font-inter text-sm text-gray-300">Nama project</label>
        <input
            id="nama_karya"
            type="text"
            name="nama_karya"
            value="{{ old('nama_karya', $karya->nama_karya ?? '') }}"
            placeholder="Web Developer, Desain Grafis, dll"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    <div class="md:col-span-2">
        <label for="deskripsi" class="mb-1 block font-inter text-sm text-gray-300">Deskripsi</label>
        <textarea
            id="deskripsi"
            name="deskripsi"
            rows="4"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >{{ old('deskripsi', $karya->deskripsi ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label for="link_karya" class="mb-1 block font-inter text-sm text-gray-300">Link karya</label>
        <input
            id="link_karya"
            type="text"
            name="link_karya"
            value="{{ old('link_karya', $karya->link_karya ?? '') }}"
            placeholder="https://... atau # kalau belum ada link"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>
</div>

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="rounded-lg bg-white px-6 py-2.5 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
        Simpan
    </button>
    <a href="{{ route('admin.karya.index') }}" class="rounded-lg border border-white/10 px-6 py-2.5 font-inter text-sm text-gray-300 transition-colors hover:bg-white/5">
        Batal
    </a>
</div>