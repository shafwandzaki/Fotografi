@extends('layout.admin')

@section('title', 'Tools')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <h1 class="font-syne text-2xl font-bold">Tools</h1>
        <a href="{{ route('admin.tools.create') }}" class="rounded-lg bg-white px-4 py-2 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
            + Tambah tool
        </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-white/10">
        <table class="w-full text-left font-inter text-sm">
            <thead class="bg-white/5 text-gray-400">
                <tr>
                    <th class="px-4 py-3">Icon</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Persen</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse ($tools as $item)
                    <tr>
                        <td class="px-4 py-3">
                            @if ($item->icon_tools)
                                <img src="{{ asset('storage/' . $item->icon_tools) }}" alt="{{ $item->nama_tools }}" class="h-10 w-10 rounded bg-white/5 object-contain p-1">
                            @else
                                <div class="flex h-10 w-10 items-center justify-center rounded bg-white/5 text-[10px] text-gray-500">-</div>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $item->nama_tools }}</td>
                        <td class="px-4 py-3 text-gray-400">{{ $item->kategori }}</td>
                        <td class="px-4 py-3 text-gray-400">{{ $item->percent }}%</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.tools.edit', $item) }}" class="rounded-lg border border-white/10 px-3 py-1.5 transition-colors hover:bg-white/5">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.tools.destroy', $item) }}" onsubmit="return confirm('Hapus tool ini?')">
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
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada tool.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $tools->links() }}
    </div>

@endsection