<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruNilaiController extends Controller
{
    /**
     * Tampilkan daftar tugas & pengumpulan
     */
    public function index()
    {
        // Ambil hanya tugas yang dibuat oleh guru yang sedang login
        $tugas = Tugas::where('guru_id', Auth::id())
                      ->with('pengumpulan.siswa')
                      ->get();

        return view('guru.nilai.index', compact('tugas'));
    }

    /**
     * Simpan nilai (A B C D)
     */
    public function store(Request $request)
    {
        $request->validate([
            'tugas_id' => 'required|exists:tugas,id',
            'siswa_id' => 'required|exists:users,id',
            'nilai'    => 'required|integer|in:100,85,75,65',
        ]);

        Nilai::updateOrCreate(
            [
                'tugas_id' => $request->tugas_id,
                'siswa_id' => $request->siswa_id,
            ],
            [
                'nilai'   => $request->nilai,
                'guru_id' => Auth::id(), // pastikan nilai tersimpan dengan guru yang login
            ]
        );

        return redirect()->route('guru.rekap.index') // pastikan route ini sesuai
                         ->with('success', 'Nilai berhasil disimpan');
    }
}
