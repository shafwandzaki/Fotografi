<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    public function index()
    {
        $karya = Karya::orderByDesc('id')->paginate(10);

        return view('admin.karya.index', compact('karya'));
    }

    public function create()
    {
        return view('admin.karya.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('img_karya')) {
            $data['img_karya'] = $request->file('img_karya')->store('karya', 'public');
        }

        Karya::create($data);

        return redirect()
            ->route('admin.karya.index')
            ->with('success', 'Karya berhasil ditambahkan.');
    }

    public function edit(Karya $karya)
    {
        return view('admin.karya.edit', compact('karya'));
    }

    public function update(Request $request, Karya $karya)
    {
        $data = $this->validated($request, $karya);

        if ($request->hasFile('img_karya')) {
            if ($karya->img_karya) {
                Storage::disk('public')->delete($karya->img_karya);
            }

            $data['img_karya'] = $request->file('img_karya')->store('karya', 'public');
        }

        $karya->update($data);

        return redirect()
            ->route('admin.karya.index')
            ->with('success', 'Karya berhasil diperbarui.');
    }

    public function destroy(Karya $karya)
    {
        if ($karya->img_karya) {
            Storage::disk('public')->delete($karya->img_karya);
        }

        $karya->delete();

        return redirect()
            ->route('admin.karya.index')
            ->with('success', 'Karya berhasil dihapus.');
    }

    private function validated(Request $request, ?Karya $karya = null): array
    {
        $isCreate = $karya === null;

        return $request->validate([
            'img_karya'  => [$isCreate ? 'required' : 'nullable', 'image', 'max:4096'],
            'nama_karya' => ['required', 'string', 'max:255'],
            'deskripsi'  => ['required', 'string'],
            'link_karya' => ['nullable', 'string', 'max:255'],
        ]);
    }
}