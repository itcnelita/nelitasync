<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        // Contoh data statis (Nantinya bisa diganti dengan model: Ekstrakulikuler::all())
        $ekskuls = [
            [
                'id' => 1,
                'nama' => 'Robotik & Coding',
                'inisial' => 'RC',
                'kategori' => 'Teknologi',
                'pembimbing' => 'Bpk. Ahmad Sujarwo',
                'jadwal' => 'Kamis, 15:30 WIB',
                'status_pendaftaran' => 'tersedia', // tersedia, penuh, terdaftar
                'color' => 'blue'
            ],
            [
                'id' => 2,
                'nama' => 'PMR',
                'inisial' => 'PM',
                'kategori' => 'Kemanusiaan',
                'pembimbing' => 'Ibu Siti Zulaikha',
                'jadwal' => 'Selasa, 15:00 WIB',
                'status_pendaftaran' => 'penuh',
                'color' => 'rose'
            ],
            [
                'id' => 3,
                'nama' => 'Basket',
                'inisial' => 'BS',
                'kategori' => 'Olahraga',
                'pembimbing' => 'Coach Doni',
                'jadwal' => 'Jumat, 16:00 WIB',
                'status_pendaftaran' => 'terdaftar',
                'color' => 'amber'
            ],
        ];

        return view('ekstrakulikuler.index', compact('ekskuls'));
    }

    public function daftar(Request $request, $id)
    {
        // Logika pendaftaran siswa ke ekskul
        // Contoh: Auth::user()->ekskuls()->attach($id);

        return back()->with('success', 'Berhasil mendaftar ekstrakurikuler!');
    }
}
