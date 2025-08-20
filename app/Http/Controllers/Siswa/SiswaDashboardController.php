<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Pengumpulan;

class SiswaDashboardController extends Controller
{
    /**
     * Halaman dashboard siswa
     */
    public function index()
    {
        $tugas = Tugas::with('pengumpulan')->get();

        $notifikasi = $tugas->filter(function($t){
            return !$t->pengumpulan->contains('siswa_id', auth()->id());
        });

        return view('siswa.dashboard', compact('tugas', 'notifikasi'));
    }

    /**
     * Form upload tugas
     */
    public function create(Tugas $tugas)
    {
        return view('siswa.pengumpulan.create', compact('tugas'));
    }

    /**
     * Simpan file pengumpulan
     */
   public function store(Request $request, Tugas $tugas)
{
    // Validasi file saja, nama diambil dari user login
    $request->validate([
        'file' => 'required|mimes:pdf,doc,docx,zip|max:2048',
    ]);

    // Simpan file ke folder 'pengumpulan' di storage/public
    $path = $request->file('file')->store('pengumpulan', 'public');

    // Buat pengumpulan baru
    Pengumpulan::create([
        'tugas_id' => $tugas->id,
        'siswa_id' => auth()->id(),
        'nama' => auth()->user()->name, // ambil nama dari user login
        'file' => $path,
    ]);

    return redirect()->route('siswa.pengumpulan.index')
        ->with('success', 'Tugas berhasil dikumpulkan!');
}


    /**
     * List pengumpulan siswa
     */
    public function indexPengumpulan()
    {
        $tugas = Tugas::all();
        $pengumpulan = Pengumpulan::where('siswa_id', auth()->id())
            ->with('tugas')
            ->get();

        return view('siswa.pengumpulan.index', compact('tugas', 'pengumpulan'));
    }

    /**
     * Edit pengumpulan
     */
    public function edit(Pengumpulan $pengumpulan)
    {
        return view('siswa.pengumpulan.edit', compact('pengumpulan'));
    }

    /**
     * Update file pengumpulan
     */
    public function update(Request $request, Pengumpulan $pengumpulan)
    {
        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,zip|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('pengumpulan', 'public');
            $pengumpulan->update(['file' => $path]);
        }

        return redirect()->route('siswa.pengumpulan.index')
            ->with('success', 'Tugas berhasil diupdate!');
    }

    /**
     * Hapus pengumpulan
     */
    public function destroy(Pengumpulan $pengumpulan)
    {
        $pengumpulan->delete();

        return redirect()->route('siswa.pengumpulan.index')
            ->with('success', 'Tugas berhasil dihapus!');
    }
}
