<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman daftar jurusan";
    }

    public function create()
    {
        return "Menampilkan halaman tambah jurusan";
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data jurusan";
    }

    public function show(string $id)
    {
        return "Menampilkan jurusan dengan ID: {$id}";
    }

    public function edit(string $id)
    {
        return "Menampilkan halaman edit jurusan dengan ID: {$id}";
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
