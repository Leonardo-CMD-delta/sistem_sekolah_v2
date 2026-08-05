<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Jurusan";
        $majors = [
            [
            'id' => 1,
            'code' => 'AKL',
            'name' => 'Akuntansi dan Keuangan Lembaga',
            'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
            'id' => 2,
            'code' => 'TKJ',
            'name' => 'Teknik Komputer dan Jaringan',
            'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
            'id' => 3,
            'code' => 'BD',
            'name' => 'Bisnis Digital',
            'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        return view ('majors.index', [
            'title' => $title,
            'majors' => $majors
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Menambahkan Jurusan";
        $description = "Membuat jurusan";

        return view('majors.create', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data jurusan";
    }

    public function show(string $id)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        $description = "Menampilkan detail Jurusan yang terdaftar";
        
        return view('majors.show', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Edit Jurusan";
        $description = "Mengedit daftar jurusan yang terdaftar";

        return view('majors.edit', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function update(Request $request, string $id)
    {
        return "Melakukan perubahan data jurusan dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data jurusan dengan ID: {$id}";
    }
}
