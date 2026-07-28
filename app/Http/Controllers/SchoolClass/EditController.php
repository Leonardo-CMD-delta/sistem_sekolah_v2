<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(string $id)
    {
        return "Menampilkan halaman edit kelas dengan ID: {$id}";
    }
}
