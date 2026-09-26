@extends('layout.admin')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <h1 class="font-syne text-2xl font-bold">Fotografi</h1>
        <a href="{{ route('admin.fotografi.create') }}" class="rounded-lg bg-white px-4 py-2 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
            + Tambah foto
        </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-white/10">
        <table class="w-full text-left font-inter text-sm">
            <thead class="bg-white/5 text-gray-400">
                <tr>
                    <th class="px-4 py-3">Foto</th>
                    <th class="px-4 py-3">Nama Foto</th>
                    <th class="px-4 py-3">Genre</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse ($fotografi as $item)
                    <tr>
                        <td class="px-4 py-3">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_foto }}" class="h-12 w-16 rounded object-cover">
                            @else
                                <div class="flex h-12 w-16 items-center justify-center rounded bg-white/5 text-[10px] text-gray-500">Tidak ada</div>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $item->nama_foto }}</td>
                        <td class="px-4 py-3 text-gray-400">{{ ucfirst(strtolower($item->genre)) }}</td>
                        <td class="px-4 py-3 text-gray-400">{{ $item->tanggal?->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.fotografi.edit', $item) }}" class="rounded-lg border border-white/10 px-3 py-1.5 transition-colors hover:bg-white/5">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.fotografi.destroy', $item) }}" onsubmit="return confirm('Hapus foto ini? Tindakan tidak bisa dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg border border-red-500/30 px-3 py-1.5 text-red-300 transition-colors hover:bg-red-500/10">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada Fotografi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $fotografi->links() }}
    </div>

@endsection

{{-- @extends('layout.admin')

@section('content')

    <div class="flex items-center justify-between mb-8 max-w-6xl">
        <h1 class="text-3xl font-bold">Fotografi</h1>
        <a href="{{ route('admin.fotografi.create') }}" class="px-6 py-2.5 bg-[#1C5BFF] hover:bg-blue-600 rounded-lg text-sm font-semibold transition-colors">
            + Tambah
        </a>
    </div>

    <div class="bg-[#191C26] border border-white/5 rounded-2xl overflow-hidden max-w-6xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#212430] text-gray-300 text-sm border-b border-white/5">
                    <tr>
                        <th class="px-6 py-4 font-medium rounded-tl-xl">Foto</th>
                        <th class="px-6 py-4 font-medium">Nama Foto</th>
                        <th class="px-6 py-4 font-medium">Genre</th>
                        <th class="px-6 py-4 font-medium">Tanggak</th>
                        <th class="px-6 py-4 font-medium rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($fotografi as $item)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 text-gray-200">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_foto }}" class="h-12 w-16 rounded object-cover">
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                <i class="{{ $item->nama_foto }} text-xl"></i>
                            </td>
                            <td class="px-6 py-4 text-gray-300">{{ $item->genre }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $item->tanggal }}%</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <a href="{{ route('admin.fotografi.edit', $item) }}" class="text-blue-600 hover:text-blue-500">Edit</a>
                                    <form action="{{ route('admin.fotografi.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus skill ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-500">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">Belum ada Fotografi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection --}}