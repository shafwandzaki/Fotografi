<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Datacontroller extends Controller
{
    public function utama()
    {
        return view ('utama', [
            'home'          => $this->home(),
            'fotografi'     => $this->fotografi(),
            'gear'          => $this->gear(),
            'tools'         => $this->tools(),
            'karya'         => $this->karya(),
        ]);
    }

    private function home(): array
    {
        return [
            'title' => 'SELAMAT DATANG DIHALAMAN FOTOGRAFI SAYA!',
            'tagline' => 'Capturing the Poetry of Shadow & Light.',
            'deskripsi' => 'My photographic work from around 2024 to the present, spanning diverse genres—such as street, landscape, and architectural photography—as well as varying moods and aspect ratios.',
            'link_instagram' => 'https://www.instagram.com/shafwandzaki_?igsi=MWp5eTR3Y2kwMWF1ZQ==',
            'link_email' => 'mailto:shafwandzaki19@gmail.com',
            'link_linkedin' => 'https://www.linkedin.com/in/muhamad-shafwan-dzaki-8744b93aa?utm_source=share_via&utm_content=profile&utm_medium=member_android'
        ];
    }

    private function fotografi(): array
    {
        return [
            [
                'foto' => '#',
                'genre' => 'STREET',
                'nama_foto' => 'My photographic work',
                'deskripsi' => 'Natural northern hemisphere indirect winter window light. Zero fill reflectors. An exercise in Rembrandt lighting and the delicate falloff of master-grade APO lens, conveying intense introspective presence.',
                'kamera' => 'Sony A6400',
                'zoom' => '35',
                'aperture' => '3.5',
                'shuterspeed' => '1/300',
                'iso' => '100',
                'tanggal' => '12 Agustus 2026',
            ],
            [
                'foto' => '#',
                'genre' => 'STREET',
                'nama_foto' => 'My photographic work',
                'deskripsi' => 'Natural northern hemisphere indirect winter window light. Zero fill reflectors. An exercise in Rembrandt lighting and the delicate falloff of master-grade APO lens, conveying intense introspective presence.',
                'kamera' => 'Sony A6400',
                'zoom' => '35',
                'aperture' => '3.5',
                'shuterspeed' => '1/300',
                'iso' => '100',
                'tanggal' => '12 Agustus 2026',
            ],
            [
                'foto' => '#',
                'genre' => 'STREET',
                'nama_foto' => 'My photographic work',
                'deskripsi' => 'Natural northern hemisphere indirect winter window light. Zero fill reflectors. An exercise in Rembrandt lighting and the delicate falloff of master-grade APO lens, conveying intense introspective presence.',
                'kamera' => 'Sony A6400',
                'zoom' => '35',
                'aperture' => '3.5',
                'shuterspeed' => '1/300',
                'iso' => '100',
                'tanggal' => '12 Agustus 2026',
            ],
        ];
    }

    private function gear(): array
    {
        return [
            [
                'foto_gear' => '#',
                'title' => 'Kamera',
                'nama_gear' => 'Sony A6400',
                'jumlah_gear' => '1'
            ],
            [
                'foto_gear' => '#',
                'title' => 'Lensa',
                'nama_gear' => 'Lensa Kit',
                'jumlah_gear' => '1'
            ],
            [
                'foto_gear' => '#',
                'title' => 'SD Card',
                'nama_gear' => 'Sandisk 64GB',
                'jumlah_gear' => '1'
            ],
            [
                'foto_gear' => '#',
                'title' => 'SD Card',
                'nama_gear' => 'Kolabex 128GB',
                'jumlah_gear' => '1'
            ],
            [
                'foto_gear' => '#',
                'title' => 'Baterai',
                'nama_gear' => 'My photographic work from around 2024',
                'jumlah_gear' => '1'
            ],
            [
                'foto_gear' => '#',
                'title' => 'Tripod',
                'nama_gear' => 'My photographic work from around 2024',
                'jumlah_gear' => '1'
            ],
        ];
    }

    private function tools(): array
    {
        return [
            [
                'icon_tools' => 'icon/logo_fotografi.png',
                'nama_tools' => 'Lightroom',
                'kategori' => 'Foto Editor',
                'percent' => '100'
            ],
            [
                'icon_tools' => 'icon/logo_fotografi.png',
                'nama_tools' => 'Afinnity',
                'kategori' => 'Desain Grafis',
                'percent' => '100'
            ],
            [
                'icon_tools' => 'icon/logo_fotografi.png',
                'nama_tools' => 'Canva',
                'kategori' => 'Desain Grafis',
                'percent' => '100'
            ],
            [
                'icon_tools' => 'icon/logo_fotografi.png',
                'nama_tools' => 'Photoshop',
                'kategori' => 'Desain Grafis',
                'percent' => '100'
            ],
            [
                'icon_tools' => 'icon/logo_fotografi.png',
                'nama_tools' => 'Capcut',
                'kategori' => 'Video Editor',
                'percent' => '100'
            ],
        ];
    }

    private function karya(): array
    {
        return [
            [
                'img_karya' => 'icon/logo_fotografi.png',
                'nama_karya' => 'Web Developer',
                'deskripsi' => 'Beberapa rancangan website yang saya buat, Saya terbiasa membangun dan merancang website yang responsif menggunakan laravel, saya lebih fokus kebagian frontend developer, juga bisa dalam mendesain website menggunakan figma.',
                'link_karya' => 'https://potofoliodzaki.infinityfreeapp.com'
            ],

            [
                'img_karya' => 'icon/logo_fotografi.png',
                'nama_karya' => 'Desain Grafis',
                'deskripsi' => 'Beberapa karya desain grafis saya dengan berbagai macam ukuran dan kreativitas dari potrait, landscape, story, feed, poster, flayer, banner, kolase, dll serta dengan berbagai macam style atau gaya visual.',
                'link_karya' => '#'
            ]
        ];
    }
}
