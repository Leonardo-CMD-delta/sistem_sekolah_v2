<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = Student::select('id','nis','name','class','major')->get();

        return view ('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }




    public function show(string $id)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar";

        return view('students.show', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Menambahkan Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar";

        return view('students.create', [
            'title' => $title,
            'description' => $description,
        ]);
    } 

    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar";

        return view('students.edit', [
            'title' => $title,
            'description' => $description,
        ]);
    } 

    public function store()
    {
        $validatedRequests = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'class' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'in:AKL,Bid,TKJ'],
        ]);

        Student::create($validatedRequests);

        return redirect() -> route('students.index')
            ->with('success', 'Berhasil Menambahkan Data Siswa Baru');
    } 

    public function update(string $id)
    {
        return "Mengubah data siswa dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}