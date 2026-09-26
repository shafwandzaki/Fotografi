<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GearController extends Controller
{
    public function index()
    {
        $gear = Gear::orderByDesc('id')->paginate(10);

        return view('admin.gear.index', compact('gear'));
    }

    public function create()
    {
        return view('admin.gear.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto_gear')) {
            $data['foto_gear'] = $request->file('foto_gear')->store('gear', 'public');
        }

        Gear::create($data);

        return redirect()
            ->route('admin.gear.index')
            ->with('success', 'Gear berhasil ditambahkan.');
    }

    public function edit(Gear $gear)
    {
        return view('admin.gear.edit', compact('gear'));
    }

    public function update(Request $request, Gear $gear)
    {
        $data = $this->validated($request, $gear);

        if ($request->hasFile('foto_gear')) {
            if ($gear->foto_gear) {
                Storage::disk('public')->delete($gear->foto_gear);
            }

            $data['foto_gear'] = $request->file('foto_gear')->store('gear', 'public');
        }

        $gear->update($data);

        return redirect()
            ->route('admin.gear.index')
            ->with('success', 'Gear berhasil diperbarui.');
    }

    public function destroy(Gear $gear)
    {
        if ($gear->foto_gear) {
            Storage::disk('public')->delete($gear->foto_gear);
        }

        $gear->delete();

        return redirect()
            ->route('admin.gear.index')
            ->with('success', 'Gear berhasil dihapus.');
    }

    private function validated(Request $request, ?Gear $gear = null): array
    {
        $isCreate = $gear === null;

        return $request->validate([
            'foto_gear'   => [$isCreate ? 'required' : 'nullable', 'image', 'max:4096'],
            'title'       => ['required', 'string', 'max:255'], // contoh: Kamera, Lensa, SD Card
            'nama_gear'   => ['required', 'string', 'max:255'],
            'jumlah_gear' => ['required', 'integer', 'min:1'],
        ]);
    }
}