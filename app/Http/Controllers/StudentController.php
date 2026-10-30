<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(request $request)
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });

            })
            ->when($class, fn ($query, $class) => $query->where('class', '=', $class))
            ->when($major, fn ($query, $major) => $query->where('major', '=', $major))
            ->paginate(10)
            ->withQueryString();

        $schoolClasses = ['10 AKL', '10 BiD', '11 AKL', '11 TKJ 1', '11 TKJ 2', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3'];
        $majors = ['AKL', 'TKJ', 'BiD'];

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolClasses' => $schoolClasses,
            'majors' => $majors,
        ]);
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title' => $title,
        ]);
    }

    public function edit(Student $student)
    {
        return view('students.edit', [
            'title' => 'Sistem Sekolah - Ubah Siswa',
            'student' => $student,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $validatedRequest = $request->validate([
            'nis' => ['required', 'digits:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'in:L,P'],
            'major' => ['required', 'string', 'in:TKJ,AKL,BID'],
            'class' => ['required', 'string'],

        ]);

        // Tambahkan Data Ke Database
        Student::create($validatedRequest);

        // Handle if succes
        return redirect()->route('students.index');
    }



    public function update(Student $student, Request $request)
    {
        $validatedRequest = $request->validate([
            'nis' => ['required', 'digits:4', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'in:L,P'],
            'major' => ['required', 'string', 'in:TKJ,AKL,BID'],
            'class' => ['required', 'string'],
        ]);

        //Update Data
        $student->update($validatedRequest);

        //Handle if success
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        // Delete Data
        $student->delete();

        // Handle if success
        return redirect()->route('students.index');
    }
}