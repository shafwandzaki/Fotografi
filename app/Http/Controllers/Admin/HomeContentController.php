<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    public function edit()
    {
        $home = HomeContent::first() ?? new HomeContent();

        return view('admin.home.edit', compact('home'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:100'],
            'tagline'        => ['required', 'string', 'max:50'],
            'deskripsi'      => ['required', 'string'],
            'link_linkedin'  => ['nullable', 'url', 'max:255'],
            'link_email'     => ['nullable', 'string', 'max:255'],
            'link_instagram' => ['nullable', 'url', 'max:255'],
        ]);

        $existing = HomeContent::first();

        $existing ? $existing->update($data) : HomeContent::create($data);

        return redirect()
            ->route('admin.home.edit')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}