@php
    $tool = $tool ?? null;
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
        <label for="icon_tools" class="mb-1 block font-inter text-sm text-gray-300">
            Icon {{ $tool ? '(kosongkan kalau tidak ingin mengganti)' : '' }}
        </label>

        @if ($tool?->icon_tools)
            <img src="{{ asset('storage/' . $tool->icon_tools) }}" alt="{{ $tool->nama_tools }}" class="mb-3 h-16 w-16 rounded-lg bg-white/5 object-contain p-2">
        @endif

        <input
            id="icon_tools"
            type="file"
            name="icon_tools"
            accept="image/*"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-white/10 file:px-3 file:py-1.5 file:text-white"
        >
    </div>

    <div>
        <label for="nama_tools" class="mb-1 block font-inter text-sm text-gray-300">Nama tool</label>
        <input
            id="nama_tools"
            type="text"
            name="nama_tools"
            value="{{ old('nama_tools', $tool->nama_tools ?? '') }}"
            placeholder="Lightroom"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    <div>
        <label for="kategori" class="mb-1 block font-inter text-sm text-gray-300">Kategori</label>
        <input
            id="kategori"
            type="text"
            name="kategori"
            value="{{ old('kategori', $tool->kategori ?? '') }}"
            placeholder="Foto Editor, Desain Grafis, Video Editor"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>

    <div>
        <label for="percent" class="mb-1 block font-inter text-sm text-gray-300">Tingkat mahir (%)</label>
        <input
            id="percent"
            type="number"
            name="percent"
            min="0"
            max="100"
            value="{{ old('percent', $tool->percent ?? 100) }}"
            class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
        >
    </div>
</div>

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="rounded-lg bg-white px-6 py-2.5 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
        Simpan
    </button>
    <a href="{{ route('admin.tools.index') }}" class="rounded-lg border border-white/10 px-6 py-2.5 font-inter text-sm text-gray-300 transition-colors hover:bg-white/5">
        Batal
    </a>
</div>