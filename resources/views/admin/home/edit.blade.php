@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-syne text-2xl font-bold">Edit profil</h1>

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

    <form method="POST" action="{{ route('admin.home.update') }}" class="max-w-2xl space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="mb-1 block font-inter text-sm text-gray-300">Title</label>
            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title', $home->title) }}"
                class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
            >
        </div>

        <div>
            <label for="tagline" class="mb-1 block font-inter text-sm text-gray-300">Tagline</label>
            <input
                id="tagline"
                type="text"
                name="tagline"
                value="{{ old('tagline', $home->tagline) }}"
                class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
            >
        </div>

        <div>
            <label for="deskripsi" class="mb-1 block font-inter text-sm text-gray-300">Deskripsi</label>
            <textarea
                id="deskripsi"
                name="deskripsi"
                rows="4"
                class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
            >{{ old('deskripsi', $home->deskripsi) }}</textarea>
        </div>

        <div>
            <label for="link_linkedin" class="mb-1 block font-inter text-sm text-gray-300">Link LinkedIn</label>
            <input
                id="link_linkedin"
                type="url"
                name="link_linkedin"
                value="{{ old('link_linkedin', $home->link_linkedin) }}"
                placeholder="https://www.linkedin.com/in/..."
                class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
            >
        </div>

        <div>
            <label for="link_email" class="mb-1 block font-inter text-sm text-gray-300">Email</label>
            <input
                id="link_email"
                type="text"
                name="link_email"
                value="{{ old('link_email', $home->link_email) }}"
                placeholder="mailto:kamu@email.com"
                class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
            >
        </div>

        <div>
            <label for="link_instagram" class="mb-1 block font-inter text-sm text-gray-300">Link Instagram</label>
            <input
                id="link_instagram"
                type="url"
                name="link_instagram"
                value="{{ old('link_instagram', $home->link_instagram) }}"
                placeholder="https://www.instagram.com/..."
                class="w-full rounded-lg border border-white/10 bg-[#1c1c1e] px-4 py-2.5 font-inter text-sm text-white"
            >
        </div>

        <button type="submit" class="rounded-lg bg-white px-6 py-2.5 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
            Simpan
        </button>
    </form>

@endsection