<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use App\Models\Fotografi;
use App\Models\Gear;
use App\Models\Tools;
use App\Models\Karya;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    public function utama()
    {
        return view('utama',[
            'home' => $this -> home(),
            'fotografi' => $this -> fotografi(),
            'genres' => Fotografi::GENRES,
            'gear' => $this -> gear(),
            'tools' => $this -> tools(),
            'karya' => $this -> karya(),
        ]);
    }

    private function home(): array
    {
        $home = HomeContent::first();

        return[
            'title' => $home->title,
            'tagline' => $home->tagline,
            'deskripsi' => $home->deskripsi,
            'link_linkedin' => $home->link_linkedin,
            'link_email' => $home->link_email,
            'link_instagram' => $home->link_instagram,
        ];
    }

    private function fotografi(): array
    {
        return Fotografi::orderByDesc('tanggal')->orderByDesc('id')->get()->map(function ($item) {
            $zoom     = filled($item->zoom) ? $item->zoom . 'mm' : '';
            $aperture = filled($item->aperture) ? 'f/' . rtrim(rtrim($item->aperture, '0'), '.') : '';
            $shutter  = filled($item->shuterspeed) ? $item->shuterspeed . 's' : '';
            $iso      = filled($item->iso) ? 'ISO ' . $item->iso : '';

            return [
                'src'       => $item->foto ? asset('storage/' . $item->foto) : asset('icon/logo_fotografi.png'),
                'download'  => $item->foto_original ? asset('storage/' . $item->foto_original) : asset('storage/' . $item->foto),
                'genre'     => strtoupper($item->genre),
                'title'     => $item->nama_foto,
                'deskripsi' => (string) $item->deskripsi,
                'kamera'    => (string) $item->kamera,
                'zoom'      => $zoom,
                'aperture'  => $aperture,
                'shutter'   => $shutter,
                'iso'       => $iso,
                'lokasi'    => (string) $item->lokasi,
                'tanggal'   => $item->tanggal?->locale('id')->translatedFormat('j F Y') ?? '',
                'meta'      => collect([$item->kamera, $zoom, $aperture, $shutter])->filter()->implode(' • '),
            ];
        })
        ->all();
    }

    private function gear(): array
    {
        return Gear::latest()->get()->map(function ($gear){
            return[
                'foto_gear' => asset('storage/' . $gear->foto_gear),
                'title' => $gear -> title,
                'nama_gear' => $gear -> nama_gear,
                'jumlah_gear' => $gear -> jumlah_gear,
            ];
        })->toArray();
    }

    private function tools(): array
    {
        return Tools::latest()->get()->map(function ($tools){
            return[
                'icon_tools' => asset('storage/' . $tools->icon_tools),
                'nama_tools' => $tools->nama_tools,
                'kategori' => $tools->kategori,
                'percent' => $tools->percent,
            ];
        })->toArray();
    }
    
    private function karya(): array
    {
        return Karya::latest()->get()->map(function ($karya){
            return[
                'img_karya' => asset('storage/' . $karya->img_karya),
                'nama_karya' => $karya->nama_karya,
                'deskripsi' => $karya->deskripsi,
                'link_karya' => $karya->link_karya,
            ];
        })->toArray();
    }
}
