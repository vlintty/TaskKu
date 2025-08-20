<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumpulanController extends Controller
{
    public function create(Tugas $tugas)
    {
        return view('siswa.pengumpulan.create', compact('tugas'));
    }

    public function store(Request $request, Tugas $tugas)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Simpan file ke storage/app/public/pengumpulan
        $file = $request->file('file')->store('pengumpulan', 'public');

        // Simpan ke database
        Pengumpulan::create([
            'tugas_id' => $tugas->id,
            'siswa_id' => Auth::id(),
            'nama'     => Auth::user()->name, // tambahkan kalau kolom ada
            'file'     => $file,
        ]);

        return redirect()->route('pengumpulan.index')
                         ->with('success', 'Tugas berhasil dikumpulkan');
    }
}
