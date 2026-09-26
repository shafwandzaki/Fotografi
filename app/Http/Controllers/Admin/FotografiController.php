<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Format;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Controllers\Controller;
use App\Models\Fotografi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotografiController extends Controller
{
    public function index()
    {
        $fotografi = Fotografi::orderByDesc('tanggal')->orderByDesc('id')->paginate(10);

        return view('admin.fotografi.index', compact('fotografi'));
    }

    public function create()
    {
        $genres = Fotografi::GENRES;

        return view('admin.fotografi.create', compact('genres'));
    }

    public function store(Request $request)
    {
       $data = $this->validated($request);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');

        // 1. Simpan file asli utuh, khusus untuk tombol download
        $data['foto_original'] = $file->store('fotografi/original', 'public');

        // 2. Bikin versi terkompresi untuk tampil di web
        $manager = new ImageManager(new Driver());
        $image = $manager->decode($file);
        $image->scaleDown(width: 1600); // lebar maksimal 1600px, tinggi menyesuaikan

        $compressedName = 'fotografi/compressed/' . uniqid() . '.webp';
        Storage::disk('public')->put($compressedName, (string) $image->encodeUsingFormat(Format::WEBP, quality: 78));

        $data['foto'] = $compressedName;
    }

    Fotografi::create($data);

    return redirect()
        ->route('admin.fotografi.index')
        ->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(Fotografi $fotografi)
    {
        $genres = Fotografi::GENRES;

        return view('admin.fotografi.edit', [
            'foto'   => $fotografi,
            'genres' => $genres,
        ]);
    }

    public function update(Request $request, Fotografi $fotografi)
    {
        $data = $this->validated($request, $fotografi);

    if ($request->hasFile('foto')) {
        if ($fotografi->foto) {
            Storage::disk('public')->delete($fotografi->foto);
        }
        if ($fotografi->foto_original) {
            Storage::disk('public')->delete($fotografi->foto_original);
        }

        $file = $request->file('foto');
        $data['foto_original'] = $file->store('fotografi/original', 'public');

        $manager = new ImageManager(new Driver());
        $image = $manager->decode($file);
        $image->scaleDown(width: 1600);

        $compressedName = 'fotografi/compressed/' . uniqid() . '.webp';
        Storage::disk('public')->put($compressedName, (string) $image->encodeUsingFormat(Format::WEBP, quality: 78));

        $data['foto'] = $compressedName;
    }

    $fotografi->update($data);

    return redirect()
        ->route('admin.fotografi.index')
        ->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Fotografi $fotografi)
    {
        if ($fotografi->foto) {
        Storage::disk('public')->delete($fotografi->foto);
        }

        if ($fotografi->foto_original) {
            Storage::disk('public')->delete($fotografi->foto_original);
        }

        $fotografi->delete();

        return redirect()
            ->route('admin.fotografi.index')
            ->with('success', 'Foto berhasil dihapus.');
    }

    private function validated(Request $request, ?Fotografi $fotografi = null): array
    {
        $isCreate = $fotografi === null;

        return $request->validate([
            'foto'        => [$isCreate ? 'required' : 'nullable', 'image', 'max:10000'],
            'genre'       => ['required', 'string', 'in:' . implode(',', Fotografi::GENRES)],
            'nama_foto'   => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
            'kamera'      => ['required', 'string', 'max:255'],
            'zoom'        => ['required', 'integer', 'min:1'],
            'aperture'    => ['required', 'numeric', 'min:0'],
            'shuterspeed' => ['required', 'string', 'max:50'],
            'iso'         => ['required', 'integer', 'min:1'],
            'lokasi'      => ['required', 'string', 'max:225'],
            'tanggal'     => ['required', 'date'],
        ]);
    }
}