<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolsController extends Controller
{
    public function index()
    {
        $tools = Tools::orderByDesc('id')->paginate(10);

        return view('admin.tools.index', compact('tools'));
    }

    public function create()
    {
        return view('admin.tools.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('icon_tools')) {
            $data['icon_tools'] = $request->file('icon_tools')->store('tools', 'public');
        }

        Tools::create($data);

        return redirect()
            ->route('admin.tools.index')
            ->with('success', 'Tool berhasil ditambahkan.');
    }

    public function edit(Tools $tool)
    {
        return view('admin.tools.edit', ['tool' => $tool]);
    }

    public function update(Request $request, Tools $tool)
    {
        $data = $this->validated($request, $tool);

        if ($request->hasFile('icon_tools')) {
            if ($tool->icon_tools) {
                Storage::disk('public')->delete($tool->icon_tools);
            }

            $data['icon_tools'] = $request->file('icon_tools')->store('tools', 'public');
        }

        $tool->update($data);

        return redirect()
            ->route('admin.tools.index')
            ->with('success', 'Tool berhasil diperbarui.');
    }

    public function destroy(Tools $tool)
    {
        if ($tool->icon_tools) {
            Storage::disk('public')->delete($tool->icon_tools);
        }

        $tool->delete();

        return redirect()
            ->route('admin.tools.index')
            ->with('success', 'Tool berhasil dihapus.');
    }

    private function validated(Request $request, ?Tools $tool = null): array
    {
        $isCreate = $tool === null;

        return $request->validate([
            'icon_tools' => [$isCreate ? 'required' : 'nullable', 'image', 'max:2048'],
            'nama_tools' => ['required', 'string', 'max:255'],
            'kategori'   => ['required', 'string', 'max:255'], // contoh: Foto Editor, Desain Grafis
            'percent'    => ['required', 'integer', 'min:0', 'max:100'],
        ]);
    }
}