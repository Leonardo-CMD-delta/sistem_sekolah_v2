<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

//Halaman daftar siswa
Route::get('/students',function(){
    return "Ini adalah halaman daftar siswa";
})->name('students.index');

//Halaman Detail siswa
Route::get('/students/{id}', function(string $id){
        return "Menampilkan detail siswa dengan ID : {$id}";
})->name('students.show');

//Halaman tambah siswa
Route::get('/students/create', function(){
    return "Ini adalah halaman tambah siswa";
})->name('students.create');

//Halaman edit siswa
Route::get('/students/{id}/edit', function(string $id){
    return "Ini adalah halaman edit siswa dengan ID: {$id}";
})->name('students.edit');

//Logika tambah siswa
Route::post('/students', function(){
    return "Menambah data siswa baru";
})->name('students.store');

//logika edit siswa
Route::put('/students/{id}', function(string $id){
    return "Mengubah data siswa dengan ID: {$id}";
})->name('students.update');

//Logika hapus siswa
Route::delete('/students/{id}', function(string $id){
    return "Mengubah data siswa dengan ID: {$id}";
})->name('students.destroy');
 